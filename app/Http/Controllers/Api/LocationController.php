<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function search(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        if (mb_strlen($query) < 2) {
            return response()->json([]);
        }

        $apiKey = (string) config('services.google_maps.key', '');
        if ($apiKey === '') {
            return response()->json([]);
        }

        $language = (string) config('services.google_maps.language', 'en');
        $region = trim((string) config('services.google_maps.region', ''));
        $country = trim((string) config('services.google_maps.country', ''));

        try {
            $autocompleteParams = [
                'input' => $query,
                'key' => $apiKey,
                'language' => $language,
            ];

            if ($region !== '') {
                $autocompleteParams['region'] = strtolower($region);
            }

            if ($country !== '') {
                $autocompleteParams['components'] = 'country:' . strtolower($country);
            }

            $autocompleteResponse = Http::timeout(8)
                ->acceptJson()
                ->get('https://maps.googleapis.com/maps/api/place/autocomplete/json', $autocompleteParams);

            if (!$autocompleteResponse->ok()) {
                Log::warning('Google Places autocomplete HTTP error', [
                    'query' => $query,
                    'status_code' => $autocompleteResponse->status(),
                ]);
                return response()->json([]);
            }

            $autocompleteJson = $autocompleteResponse->json();
            Log::info('Google Places autocomplete response', [
                'query' => $query,
                'google_status' => $autocompleteJson['status'] ?? null,
                'prediction_count' => is_array($autocompleteJson['predictions'] ?? null)
                    ? count($autocompleteJson['predictions'])
                    : 0,
            ]);

            $predictions = collect($autocompleteJson['predictions'] ?? [])
                ->filter(fn($item) => is_array($item) && !empty($item['place_id']))
                ->take(10)
                ->values();

            if ($predictions->isEmpty()) {
                return response()->json([]);
            }

            $placeIds = $predictions
                ->pluck('place_id')
                ->filter(fn($id) => is_string($id) && $id !== '')
                ->values()
                ->all();

            $predictionDescriptions = $predictions
                ->mapWithKeys(function ($item) {
                    $placeId = is_string($item['place_id'] ?? null) ? $item['place_id'] : null;
                    $description = is_string($item['description'] ?? null)
                        ? trim($item['description'])
                        : '';

                    if ($placeId === null || $description === '') {
                        return [];
                    }

                    return [$placeId => $description];
                })
                ->all();

            $detailResponses = Http::pool(function ($pool) use ($placeIds, $apiKey, $language, $region) {
                $requests = [];

                foreach ($placeIds as $placeId) {
                    $requests[$placeId] = $pool
                        ->as($placeId)
                        ->timeout(8)
                        ->acceptJson()
                        ->get('https://maps.googleapis.com/maps/api/place/details/json', array_filter([
                            'place_id' => $placeId,
                            'fields' => 'geometry/location,formatted_address,name,address_components',
                            'language' => $language,
                            'region' => $region !== '' ? strtolower($region) : null,
                            'key' => $apiKey,
                        ]));
                }

                return $requests;
            });

            $detailsByPlaceId = [];
            foreach ($placeIds as $placeId) {
                $response = $detailResponses[$placeId] ?? null;
                if (!$response || !$response->ok()) {
                    continue;
                }

                $result = $response->json('result');
                $location = $result['geometry']['location'] ?? null;

                if (!is_array($location)) {
                    continue;
                }

                $lat = $location['lat'] ?? null;
                $lng = $location['lng'] ?? null;

                if (!is_numeric($lat) || !is_numeric($lng)) {
                    continue;
                }

                $name = is_string($result['name'] ?? null) ? trim($result['name']) : '';
                $address = is_string($result['formatted_address'] ?? null)
                    ? trim($result['formatted_address'])
                    : '';

                $label = $address !== '' ? $address : $name;
                if ($name !== '' && $address !== '' && !str_starts_with(strtolower($address), strtolower($name))) {
                    $label = $name . ', ' . $address;
                }

                $suggestionLabel = $predictionDescriptions[$placeId] ?? $label;
                $postalCode = $this->extractPostalCode($result['address_components'] ?? []);

                if ($postalCode !== '' && !str_contains(strtolower($suggestionLabel), strtolower($postalCode))) {
                    $suggestionLabel = $suggestionLabel . ', ' . $postalCode;
                }

                $detailsByPlaceId[$placeId] = [
                    'lat' => (string) $lat,
                    'lon' => (string) $lng,
                    'display_name' => $suggestionLabel,
                ];
            }

            $results = [];
            foreach ($placeIds as $placeId) {
                if (isset($detailsByPlaceId[$placeId])) {
                    $results[] = $detailsByPlaceId[$placeId];
                }
            }

            Log::info('Google Places resolved location results', [
                'query' => $query,
                'result_count' => count($results),
            ]);

            return response()->json($results);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([]);
        }
    }

    public function route(Request $request)
    {
        $fromLat = (float) $request->input('from.lat');
        $fromLon = (float) $request->input('from.lon');
        $toLat = (float) $request->input('to.lat');
        $toLon = (float) $request->input('to.lon');

        if (!$fromLat || !$fromLon || !$toLat || !$toLon) {
            return response()->json(['error' => 'Missing coordinates'], 400);
        }

        $apiKey = (string) config('services.google_maps.key', '');
        if ($apiKey === '') {
            return response()->json(['error' => 'Missing API key'], 500);
        }

        try {
            $response = Http::timeout(8)
                ->withHeaders([
                    'X-Goog-Api-Key' => $apiKey,
                    'X-Goog-FieldMask' => 'routes.distanceMeters,routes.duration',
                ])
                ->post('https://routes.googleapis.com/directions/v2:computeRoutes', [
                    'origin' => [
                        'location' => [
                            'latLng' => [
                                'latitude' => $fromLat,
                                'longitude' => $fromLon,
                            ],
                        ],
                    ],
                    'destination' => [
                        'location' => [
                            'latLng' => [
                                'latitude' => $toLat,
                                'longitude' => $toLon,
                            ],
                        ],
                    ],
                    'travelMode' => 'DRIVE',
                ]);

            if (!$response->ok()) {
                Log::warning('Google Routes API HTTP error', [
                    'status_code' => $response->status(),
                ]);
                return response()->json(['distance_km' => 0, 'duration_minutes' => 0]);
            }

            $data = $response->json();
            $route = $data['routes'][0] ?? null;

            if (!$route) {
                Log::warning('Google Routes API returned no routes');
                return response()->json(['distance_km' => 0, 'duration_minutes' => 0]);
            }

            $distanceMeters = (float) ($route['distanceMeters'] ?? 0);
            $durationRaw = (string) ($route['duration'] ?? '0s');
            $durationSeconds = (int) rtrim($durationRaw, 's');

            return response()->json([
                'distance_km' => round($distanceMeters / 1000, 1),
                'duration_minutes' => round($durationSeconds / 60),
            ]);
        } catch (\Throwable $exception) {
            report($exception);
            return response()->json(['distance_km' => 0, 'duration_minutes' => 0]);
        }
    }

    private function extractPostalCode(mixed $components): string
    {
        if (!is_array($components)) {
            return '';
        }

        foreach ($components as $component) {
            if (!is_array($component)) {
                continue;
            }

            $types = $component['types'] ?? [];
            if (!is_array($types)) {
                continue;
            }

            if (!in_array('postal_code', $types, true)) {
                continue;
            }

            $shortName = is_string($component['short_name'] ?? null) ? trim($component['short_name']) : '';
            if ($shortName !== '') {
                return $shortName;
            }

            $longName = is_string($component['long_name'] ?? null) ? trim($component['long_name']) : '';
            if ($longName !== '') {
                return $longName;
            }
        }

        return '';
    }
}
