<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class GrandRoundJourneySeeder extends Seeder
{
    /**
     * Seed Sri Lanka Grand Round Journey (17 days / 16 nights).
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'grand-round-journeys'],
            [
                'name' => 'Grand Round Journeys',
                'description' => 'Extended Sri Lanka luxury circuits across heritage, wildlife, tea country, and coastal regions.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '17-day-sri-lanka-grand-round-journey'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Sri Lanka Grand Round Journey (17 Days)',
                'short_description' => 'A polished island circuit covering heritage capitals, Wilpattu, Trincomalee east coast, tea country, Yala, and southern elegance.',
                'description' => 'This 17-day luxury sample journey combines ancient heritage, wild landscapes, east coast marine experiences, tea highlands, safari country, and a refined Galle finale in one seamless private circuit.',
                'featured_image' => 'tours/sri-lanka-grand-round-journey.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/negombo.jpg',
                    'tours/sri-lanka/wilpattu.jpg',
                    'tours/sri-lanka/trincomalee.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/tea-country.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 17,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'As per itinerary (B, D with selected B/L/D days and leisure-day breakfast only where specified)',
                'max_group_size' => 12,
                'price_per_person' => 0,
                'difficulty' => 'Moderate',
                'included' => [
                    'Airport meet-and-assist and private chauffeur-guide service',
                    'Private transfers throughout the route',
                    'Accommodation in luxury or upscale hotels/lodges as listed or similar',
                    'Meals as indicated per day in itinerary',
                    'Wilpattu safari experiences',
                    'Anuradhapura heritage exploration',
                    'Pigeon Island marine excursion (weather permitting)',
                    'Sigiriya and Dambulla cultural experiences',
                    'Kandy and tea-country touring',
                    'Yala safari experiences',
                    'Galle Fort heritage stay and exploration',
                ],
                'excluded' => [
                    'International flights, visa fees, and insurance',
                    'Meals not listed in the itinerary',
                    'Optional excursions and upgrades not listed as included',
                    'Personal expenses and beverages',
                    'Tips and gratuities',
                    'Early check-in and late check-out charges',
                ],
                'highlights' => [
                    'Negombo soft-landing coastal arrival',
                    'Wilpattu villu landscapes and safari immersion',
                    'Anuradhapura sacred-heritage atmosphere',
                    'Trincomalee east-coast beach and Pigeon Island marine life',
                    'Sigiriya and Dambulla Cultural Triangle icons',
                    'Kandy heritage and hill-country transition',
                    'Luxury tea-country stay in Hatton highlands',
                    'Yala flagship wildlife safari',
                    'Galle Fort southern elegance and wellness-oriented finish',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Negombo', 'hotel' => 'Jetwing Blue / Heritance Negombo', 'room' => 'Deluxe Room'],
                    ['destination' => 'Wilpattu', 'hotel' => 'Taru Villas Villu, Wilpattu', 'room' => 'Luxury Room'],
                    ['destination' => 'Anuradhapura', 'hotel' => 'Uga Ulagalla', 'room' => 'Pool Villa Style'],
                    ['destination' => 'Trincomalee', 'hotel' => 'Trinco Blu by Cinnamon', 'room' => 'Deluxe Room'],
                    ['destination' => 'Sigiriya', 'hotel' => 'Jetwing Vil Uyana', 'room' => 'Luxury Dwelling'],
                    ['destination' => 'Kandy', 'hotel' => 'The Golden Crown Hotel', 'room' => 'Deluxe Room'],
                    ['destination' => 'Hatton / Tea Country', 'hotel' => 'Ceylon Tea Trails', 'room' => 'Luxury Bungalow Suite'],
                    ['destination' => 'Yala', 'hotel' => 'Wild Coast Tented Lodge', 'room' => 'Luxury Cocoon'],
                    ['destination' => 'Galle', 'hotel' => 'Amangalla', 'room' => 'Heritage Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => 'Rates on request (season-sensitive east/south coast routing)',
                        'rates' => [
                            ['group' => 'Custom quote', 'price' => 0],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Seamless full-island private routing with premium pacing',
                    'Balanced sequence of heritage, coast, highland, and safari environments',
                ],
                'other_conditions' => [
                    'Driving times are approximate and depend on route, traffic, and weather.',
                    'East and south coast experiences are season-sensitive and may be adjusted for best conditions.',
                    'Hotel substitutions may apply while preserving category and journey quality.',
                    'Marine excursions such as Pigeon Island are subject to sea/weather conditions.',
                ],
                'general_reminders' => [
                    'This itinerary is designed as a premium sample and can be tailored by client pace and profile.',
                    'Wildlife sightings cannot be guaranteed in any national park.',
                    'Temple and sacred sites require respectful attire and footwear removal where requested.',
                ],
                'hotel_rules' => 'Standard hotel policies apply for check-in/check-out and are subject to each property.',
                'alcohol_policy' => 'Alcohol service may be restricted in certain venues during religious observances.',
                'attire_policy' => 'Appropriate attire is required at religious sites, with shoulders and knees covered and footwear removed where applicable.',
                'blackout_notes' => 'Peak periods and festive dates may attract supplements or minimum stay conditions.',
                'extra_supplements' => [
                    'Private specialist guides and curated premium add-ons can be arranged on request.',
                ],
                'meta_title' => 'Sri Lanka Grand Round Journey | 17 Days Luxury Island Circuit',
                'meta_description' => '17-day Sri Lanka round journey featuring heritage capitals, Wilpattu safaris, Trincomalee beaches, tea country, Yala wildlife, and Galle luxury finale.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo / Transfer to Negombo',
                'description' => 'Arrival assistance, private transfer to Negombo, and soft coastal evening to recover after the flight.',
                'meals' => 'Dinner',
                'accommodation' => 'Negombo',
            ],
            [
                'day_number' => 2,
                'title' => 'Negombo to Wilpattu',
                'description' => 'Scenic transfer into dry-zone wilderness and lodge leisure near Wilpattu ecosystem.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Wilpattu',
            ],
            [
                'day_number' => 3,
                'title' => 'Wilpattu National Park Safari',
                'description' => 'Morning safari in Wilpattu with optional second game drive and immersive villu landscape exploration.',
                'meals' => 'Breakfast, Lunch & Dinner',
                'accommodation' => 'Wilpattu',
            ],
            [
                'day_number' => 4,
                'title' => 'Wilpattu to Anuradhapura',
                'description' => 'Short transfer from wilderness to Sri Lanka’s ancient first capital with atmospheric heritage touring.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Anuradhapura',
            ],
            [
                'day_number' => 5,
                'title' => 'Anuradhapura to Trincomalee',
                'description' => 'Cross-island journey to east coast beach environment with leisure-focused arrival.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Trincomalee',
            ],
            [
                'day_number' => 6,
                'title' => 'Trincomalee and Pigeon Island',
                'description' => 'Marine excursion to Pigeon Island for snorkeling and reef-based soft adventure, followed by beach relaxation.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Trincomalee',
            ],
            [
                'day_number' => 7,
                'title' => 'Trincomalee Leisure Day',
                'description' => 'Full east-coast downtime with optional marine or cultural add-ons based on preference.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Trincomalee',
            ],
            [
                'day_number' => 8,
                'title' => 'Trincomalee to Sigiriya',
                'description' => 'Return inland to Sigiriya region for eco-luxury stay and relaxed afternoon.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Sigiriya',
            ],
            [
                'day_number' => 9,
                'title' => 'Sigiriya and Dambulla',
                'description' => 'Early Sigiriya Rock Fortress visit followed by Dambulla cave-temple heritage experience.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Sigiriya',
            ],
            [
                'day_number' => 10,
                'title' => 'Sigiriya to Kandy',
                'description' => 'Journey to Kandy with optional en-route cultural stops and evening temple district atmosphere.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 11,
                'title' => 'Kandy to Tea Country',
                'description' => 'Scenic hill-country transfer into luxury tea-estate zone with restful highland evening.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Hatton / Tea Country',
            ],
            [
                'day_number' => 12,
                'title' => 'Tea Country Experience',
                'description' => 'Leisurely tea-estate day with optional guided walks, tea tasting, cycling, and scenic relaxation.',
                'meals' => 'Breakfast, Lunch & Dinner',
                'accommodation' => 'Hatton / Tea Country',
            ],
            [
                'day_number' => 13,
                'title' => 'Tea Country to Yala',
                'description' => 'Cross-country transfer from highlands to south-east safari country and luxury lodge arrival.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yala',
            ],
            [
                'day_number' => 14,
                'title' => 'Yala National Park Safari',
                'description' => 'Flagship safari day with morning game drive and optional afternoon wildlife or ranger-led nature activity.',
                'meals' => 'Breakfast, Lunch & Dinner',
                'accommodation' => 'Yala',
            ],
            [
                'day_number' => 15,
                'title' => 'Yala to Galle',
                'description' => 'South-coast transfer to heritage Galle with sunset rampart walk and elegant old-town ambiance.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Galle',
            ],
            [
                'day_number' => 16,
                'title' => 'Galle and Southern Coast Leisure',
                'description' => 'Final full day for relaxed Galle exploration, boutique browsing, spa, and coastal leisure.',
                'meals' => 'Breakfast',
                'accommodation' => 'Galle',
            ],
            [
                'day_number' => 17,
                'title' => 'Galle to Colombo / Airport Departure',
                'description' => 'Comfortable expressway transfer to Colombo or airport with optional short city stop depending on flight schedule.',
                'meals' => 'Breakfast',
                'accommodation' => null,
            ],
        ];

        $tour->itineraries()->delete();
        foreach ($itinerary as $day) {
            $tour->itineraries()->create($day);
        }
    }
}
