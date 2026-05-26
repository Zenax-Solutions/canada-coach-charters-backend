<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $tours = Tour::with('category')
            ->withCount('itineraries')
            ->where('status', 'published')
            ->when($request->boolean('featured'), fn($q) => $q->where('is_featured', true))
            ->when($request->filled('category'), fn($q) => $q->whereHas('category', fn($q2) => $q2->where('slug', $request->string('category'))))
            ->when($request->filled('country'), fn($q) => $q->where('country', $request->string('country')))
            ->when($request->filled('search'), function ($q) use ($request) {
                $term = '%' . $request->string('search') . '%';
                $q->where(function ($inner) use ($term) {
                    $inner->where('title', 'like', $term)
                        ->orWhere('short_description', 'like', $term)
                        ->orWhere('description', 'like', $term);
                });
            })
            ->latest()
            ->paginate($request->per_page ?? 12);

        return response()->json($tours);
    }

    public function show(string $slug)
    {
        $tour = Tour::with(['category', 'itineraries'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedTours = Tour::with('category')
            ->where('status', 'published')
            ->where('id', '!=', $tour->id)
            ->when($tour->tour_category_id, fn($q) => $q->where('tour_category_id', $tour->tour_category_id))
            ->latest()
            ->limit(3)
            ->get();

        return response()->json([
            ...$tour->toArray(),
            'related_tours' => $relatedTours,
        ]);
    }

    public function categories()
    {
        return response()->json(
            TourCategory::query()
                ->withCount([
                    'tours as tours_count' => fn($q) => $q->where('status', 'published'),
                ])
                ->orderBy('name')
                ->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->tourRules());

        $tour = Tour::create($this->mapTourPayload($data));
        $this->syncItineraries($tour, $data['itineraries'] ?? []);

        return response()->json($tour->load(['category', 'itineraries']), 201);
    }

    public function update(Request $request, Tour $tour)
    {
        $data = $request->validate($this->tourRules($tour->id));

        $tour->update($this->mapTourPayload($data));

        if (array_key_exists('itineraries', $data)) {
            $this->syncItineraries($tour, $data['itineraries'] ?? []);
        }

        return response()->json($tour->load(['category', 'itineraries']));
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return response()->json(['message' => 'Tour deleted']);
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('tour_categories', 'slug')],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
        ]);

        $category = TourCategory::create($data);
        return response()->json($category, 201);
    }

    public function updateCategory(Request $request, TourCategory $tourCategory)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('tour_categories', 'slug')->ignore($tourCategory->id)],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
        ]);

        $tourCategory->update($data);
        return response()->json($tourCategory);
    }

    public function destroyCategory(TourCategory $tourCategory)
    {
        if ($tourCategory->tours()->exists()) {
            return response()->json(['message' => 'Cannot delete category with assigned tours'], 422);
        }

        $tourCategory->delete();
        return response()->json(['message' => 'Category deleted']);
    }

    private function mapTourPayload(array $data): array
    {
        return [
            'tour_category_id' => $data['tour_category_id'] ?? null,
            'title' => $data['title'],
            'slug' => $data['slug'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'featured_image' => $data['featured_image'] ?? null,
            'gallery_images' => $data['gallery_images'] ?? null,
            'duration_days' => $data['duration_days'],
            'start_location' => $data['start_location'] ?? 'Colombo, Sri Lanka',
            'end_location' => $data['end_location'] ?? 'Colombo, Sri Lanka',
            'country' => $data['country'] ?? null,
            'meal_plan' => $data['meal_plan'] ?? null,
            'max_group_size' => $data['max_group_size'] ?? 20,
            'price_per_person' => $data['price_per_person'],
            'difficulty' => $data['difficulty'] ?? 'Easy',
            'included' => $data['included'] ?? null,
            'excluded' => $data['excluded'] ?? null,
            'highlights' => $data['highlights'] ?? null,
            'accommodation_chart' => $data['accommodation_chart'] ?? null,
            'pricing_periods' => $data['pricing_periods'] ?? null,
            'complements' => $data['complements'] ?? null,
            'other_conditions' => $data['other_conditions'] ?? null,
            'general_reminders' => $data['general_reminders'] ?? null,
            'hotel_rules' => $data['hotel_rules'] ?? null,
            'alcohol_policy' => $data['alcohol_policy'] ?? null,
            'attire_policy' => $data['attire_policy'] ?? null,
            'blackout_notes' => $data['blackout_notes'] ?? null,
            'extra_supplements' => $data['extra_supplements'] ?? null,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'is_featured' => $data['is_featured'] ?? false,
            'status' => $data['status'] ?? 'draft',
        ];
    }

    private function syncItineraries(Tour $tour, array $itineraries): void
    {
        $tour->itineraries()->delete();

        foreach ($itineraries as $item) {
            $tour->itineraries()->create([
                'day_number' => $item['day_number'],
                'title' => $item['title'],
                'description' => $item['description'],
                'accommodation' => $item['accommodation'] ?? null,
                'meals' => $item['meals'] ?? null,
                'activities' => $item['activities'] ?? null,
            ]);
        }
    }

    private function tourRules(?int $ignoreTourId = null): array
    {
        return [
            'tour_category_id' => ['nullable', 'integer', 'exists:tour_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('tours', 'slug')->ignore($ignoreTourId)],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['string', 'max:255'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'start_location' => ['nullable', 'string', 'max:255'],
            'end_location' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:120'],
            'meal_plan' => ['nullable', 'string', 'max:255'],
            'max_group_size' => ['nullable', 'integer', 'min:1'],
            'price_per_person' => ['required', 'numeric', 'min:0'],
            'difficulty' => ['nullable', 'string', 'max:120'],
            'included' => ['nullable', 'array'],
            'included.*' => ['string'],
            'excluded' => ['nullable', 'array'],
            'excluded.*' => ['string'],
            'highlights' => ['nullable', 'array'],
            'highlights.*' => ['string'],
            'accommodation_chart' => ['nullable', 'array'],
            'pricing_periods' => ['nullable', 'array'],
            'complements' => ['nullable', 'array'],
            'complements.*' => ['string'],
            'other_conditions' => ['nullable', 'array'],
            'other_conditions.*' => ['string'],
            'general_reminders' => ['nullable', 'array'],
            'general_reminders.*' => ['string'],
            'hotel_rules' => ['nullable', 'string'],
            'alcohol_policy' => ['nullable', 'string'],
            'attire_policy' => ['nullable', 'string'],
            'blackout_notes' => ['nullable', 'string'],
            'extra_supplements' => ['nullable', 'array'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'status' => ['nullable', Rule::in(['draft', 'published'])],
            'itineraries' => ['nullable', 'array'],
            'itineraries.*.day_number' => ['required', 'integer', 'min:1'],
            'itineraries.*.title' => ['required', 'string', 'max:255'],
            'itineraries.*.description' => ['required', 'string'],
            'itineraries.*.accommodation' => ['nullable', 'string', 'max:255'],
            'itineraries.*.meals' => ['nullable', 'string', 'max:255'],
            'itineraries.*.activities' => ['nullable', 'array'],
            'itineraries.*.activities.*' => ['string'],
        ];
    }
}
