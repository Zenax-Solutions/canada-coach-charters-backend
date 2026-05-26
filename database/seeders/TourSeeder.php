<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Seed tours and itineraries for tourism catalog.
     */
    public function run(): void
    {
        $wildlife = TourCategory::query()->updateOrCreate(
            ['slug' => 'wildlife-safaris'],
            [
                'name' => 'Wildlife Safaris',
                'description' => 'National park safaris, bird watching, and wildlife-focused adventures across Sri Lanka.',
            ]
        );

        $heritage = TourCategory::query()->updateOrCreate(
            ['slug' => 'heritage-culture'],
            [
                'name' => 'Heritage & Culture',
                'description' => 'UNESCO heritage sites, temples, and authentic cultural experiences.',
            ]
        );

        $coastal = TourCategory::query()->updateOrCreate(
            ['slug' => 'coastal-escapes'],
            [
                'name' => 'Coastal Escapes',
                'description' => 'Beach stays, whale watching, and scenic coastal experiences.',
            ]
        );

        $mainTour = Tour::query()->updateOrCreate(
            ['slug' => '13-day-sri-lanka-wildlife-heritage-tour'],
            [
                'tour_category_id' => $wildlife->id,
                'title' => '13-Day Sri Lanka Wildlife & Heritage Tour',
                'short_description' => 'A private guided journey through Sri Lanka combining iconic wildlife safaris, rainforest exploration, and UNESCO heritage landmarks.',
                'description' => 'This 13-day private guided tour blends Sri Lanka\'s wildlife, landscapes, and cultural heritage. Travel from Negombo to Wilpattu, Kandy, Sinharaja, Udawalawe, Yala, and Galle with curated excursions, professional guiding, and half-board accommodation.',
                'featured_image' => 'tours/sri-lanka-wildlife-heritage.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/negombo.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 13,
                'start_location' => 'Colombo Airport, Sri Lanka',
                'end_location' => 'Colombo Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Half Board (Breakfast & Dinner daily)',
                'max_group_size' => 12,
                'price_per_person' => 2080,
                'difficulty' => 'Easy',
                'included' => [
                    'Meet and greet at Bandaranaike International Airport',
                    '12 nights accommodation on half board basis',
                    'Air-conditioned private transport throughout tour',
                    'Professional English-speaking guide',
                    'All current taxes and service charges',
                    'Relevant sightseeing and park entrance tickets as specified',
                    'Safari jeep experiences at Wilpattu, Udawalawe, Yala, Lunugamwehera, and Bundala',
                    'Temple of the Tooth, cultural show, turtle hatchery, Galle Fort Museum, Dutch Canal boat ride, and whale watching',
                ],
                'excluded' => [
                    'Optional excursions not specified in the itinerary',
                    'Beverages throughout the tour',
                    'Meals not explicitly mentioned',
                    'Personal expenses',
                    'Tips and gratuities',
                    'Early check-in and late check-out charges',
                ],
                'highlights' => [
                    'Wilpattu, Udawalawe, Yala, Lunugamwehera, and Bundala safaris',
                    'UNESCO experiences in Anuradhapura, Sinharaja, and Galle',
                    'Temple of the Tooth in Kandy',
                    'Whale watching option in Mirissa (seasonal)',
                    'Traditional stilt fishing in Weligama',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Negombo', 'hotel' => 'Jetwing Beach', 'room' => 'Deluxe Room'],
                    ['destination' => 'Anuradhapura', 'hotel' => 'The Lake Forest', 'room' => 'Deluxe Room'],
                    ['destination' => 'Kandy', 'hotel' => 'Cinnamon Citadel', 'room' => 'Superior Room'],
                    ['destination' => 'Sinharaja', 'hotel' => 'The Rainforest Ecolodge', 'room' => 'Chalet'],
                    ['destination' => 'Udawalawe', 'hotel' => 'Grand Udawalawe Safari Resort', 'room' => 'Deluxe Room'],
                    ['destination' => 'Yala', 'hotel' => 'Cinnamon Wild', 'room' => 'Jungle Chalet'],
                    ['destination' => 'Galle', 'hotel' => 'Le Grand Galle', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => '01 Nov 2025 - 19 Dec 2025 & 01 Apr 2026 - 30 Apr 2026',
                        'rates' => [
                            ['group' => '02 Pax', 'price' => 2495],
                            ['group' => '03-05 Pax', 'price' => 2335],
                            ['group' => '06-08 Pax', 'price' => 2120],
                            ['group' => '09-12 Pax', 'price' => 2080],
                        ],
                        'triple_reduction' => 187,
                        'single_supplement' => 965,
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '11 Jan 2026 - 31 Mar 2026',
                        'rates' => [
                            ['group' => '02 Pax', 'price' => 2650],
                            ['group' => '03-05 Pax', 'price' => 2495],
                            ['group' => '06-08 Pax', 'price' => 2275],
                            ['group' => '09-12 Pax', 'price' => 2240],
                        ],
                        'triple_reduction' => 238,
                        'single_supplement' => 1118,
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 May 2026 - 31 Oct 2026',
                        'rates' => [
                            ['group' => '02 Pax', 'price' => 2525],
                            ['group' => '03-05 Pax', 'price' => 2365],
                            ['group' => '06-08 Pax', 'price' => 2150],
                            ['group' => '09-12 Pax', 'price' => 2110],
                        ],
                        'triple_reduction' => 190,
                        'single_supplement' => 991,
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Sea shell garlands',
                    'Two 500ml water bottles per person per day',
                ],
                'other_conditions' => [
                    'Optional excursions and additional services can be arranged at extra cost.',
                    'Wildlife park visits are at client\'s own risk.',
                    'Safari vehicles are basic, non-air-conditioned, with basic insurance cover.',
                    'Hotels are subject to availability at booking time.',
                    'Price changes may apply if hotel substitutions are required.',
                ],
                'general_reminders' => [
                    'Standard hotel check-in: 12:00-14:00 depending on property.',
                    'Standard hotel check-out: 11:00.',
                    'Visitors must wear respectful attire at religious sites.',
                    'Hats and footwear should be removed at religious monuments.',
                ],
                'hotel_rules' => 'Official check-in is generally between 12:00 and 14:00 depending on hotel. Official check-out is generally 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Modest attire is required at religious sites. Shorts and sleeveless tops are not accepted in places such as the Temple of the Tooth and sacred Buddhist sites in Anuradhapura.',
                'blackout_notes' => 'Blackout period: 20 Dec 2025 to 10 Jan 2026.',
                'extra_supplements' => [
                    'Perahara supplement: USD 80 per room per night in Kandy from 01 Jul to 31 Aug 2026.',
                ],
                'meta_title' => '13-Day Sri Lanka Wildlife & Heritage Tour Package',
                'meta_description' => 'Private guided Sri Lanka wildlife and heritage tour with safaris, UNESCO sites, and premium half-board accommodation.',
                'is_featured' => true,
                'status' => 'published',
            ]
        );

        $mainItinerary = [
            ['day_number' => 1, 'title' => 'Arrival in Colombo - Transfer to Negombo', 'description' => 'Airport welcome, transfer to Negombo, and evening boat ride on Negombo Lagoon through mangroves and birdlife.', 'meals' => 'Dinner', 'accommodation' => 'Jetwing Beach (or similar)'],
            ['day_number' => 2, 'title' => 'Negombo - Wilpattu - Anuradhapura', 'description' => 'Drive to Wilpattu National Park for afternoon game drive, then continue to Anuradhapura.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'The Lake Forest (or similar)'],
            ['day_number' => 3, 'title' => 'Anuradhapura & Wilpattu', 'description' => 'Morning safari at Wilpattu and afternoon city tour of Anuradhapura\'s sacred ruins and ancient monuments.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'The Lake Forest (or similar)'],
            ['day_number' => 4, 'title' => 'Anuradhapura - Kandy', 'description' => 'Travel to Kandy, visit Peradeniya Royal Botanical Gardens, and evening visit to the Temple of the Tooth.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Cinnamon Citadel (or similar)'],
            ['day_number' => 5, 'title' => 'Kandy - Sinharaja Rainforest', 'description' => 'Transfer to Sinharaja Rainforest Reserve and evening guided bird-watching walk with endemic species spotting.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Rainforest Eco Lodge (or similar)'],
            ['day_number' => 6, 'title' => 'Sinharaja - Udawalawe', 'description' => 'Morning rainforest bird walk, then transfer to Udawalawe and visit Elephant Transit Home.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Centauria Wild (or similar)'],
            ['day_number' => 7, 'title' => 'Udawalawe National Park', 'description' => 'Morning and afternoon jeep safaris to observe elephants, deer, jackals, monkeys, and endemic birds.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Centauria Wild (or similar)'],
            ['day_number' => 8, 'title' => 'Udawalawe - Lunugamwehera - Yala', 'description' => 'Drive to Lunugamwehera for safari and continue onward to Yala National Park.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Cinnamon Wild (or similar)'],
            ['day_number' => 9, 'title' => 'Yala National Park', 'description' => 'Full-day safari focus with morning and afternoon drives in Yala\'s forests, grasslands, and lagoons.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Cinnamon Wild (or similar)'],
            ['day_number' => 10, 'title' => 'Yala - Bundala - Weligama - Galle', 'description' => 'Visit Bundala biosphere reserve, stop at Weligama stilt fishing area, then continue to Galle.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Le Grand Galle (or similar)'],
            ['day_number' => 11, 'title' => 'Galle & Surroundings', 'description' => 'Optional whale watching (seasonal) or cycling route, turtle hatchery visit, and evening Galle Fort walking tour.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Le Grand Galle (or similar)'],
            ['day_number' => 12, 'title' => 'Galle - Leisure Day', 'description' => 'Leisure day for beach relaxation, boutique visits, cafes, spa, or sunset walk along fort ramparts.', 'meals' => 'Breakfast & Dinner', 'accommodation' => 'Le Grand Galle (or similar)'],
            ['day_number' => 13, 'title' => 'Galle - Colombo Departure', 'description' => 'Morning transfer from Galle to Colombo Airport for onward departure.', 'meals' => 'Breakfast', 'accommodation' => null],
        ];

        $mainTour->itineraries()->delete();
        foreach ($mainItinerary as $day) {
            $mainTour->itineraries()->create($day);
        }

        $this->seedQuickTour(
            $wildlife->id,
            '8-Day Sri Lanka Big-Five Safari Escape',
            '8-day-sri-lanka-big-five-safari-escape',
            'Compact safari-focused adventure covering Wilpattu, Udawalawe, and Yala with expert guide support.',
            8,
            1890,
            true
        );

        $this->seedQuickTour(
            $heritage->id,
            '10-Day Cultural Triangle & Hill Country Discovery',
            '10-day-cultural-triangle-hill-country-discovery',
            'A heritage-rich Sri Lanka circuit with temples, ancient kingdoms, Kandy traditions, and scenic highlands.',
            10,
            1995,
            false
        );

        $this->seedQuickTour(
            $coastal->id,
            '9-Day Southern Coast & Whale Trail',
            '9-day-southern-coast-whale-trail',
            'Beach and marine-focused route through Galle, Mirissa, and coastal sanctuaries with curated excursions.',
            9,
            1750,
            false
        );
    }

    private function seedQuickTour(
        int $categoryId,
        string $title,
        string $slug,
        string $shortDescription,
        int $days,
        float $price,
        bool $featured
    ): void {
        $tour = Tour::query()->updateOrCreate(
            ['slug' => $slug],
            [
                'tour_category_id' => $categoryId,
                'title' => $title,
                'short_description' => $shortDescription,
                'description' => $shortDescription,
                'featured_image' => 'tours/placeholder-tour.jpg',
                'duration_days' => $days,
                'start_location' => 'Colombo Airport, Sri Lanka',
                'end_location' => 'Colombo Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Half Board',
                'max_group_size' => 12,
                'price_per_person' => $price,
                'difficulty' => 'Easy',
                'included' => ['Private transfers', 'English-speaking guide', 'Selected entrance fees'],
                'excluded' => ['International flights', 'Personal expenses', 'Tips'],
                'highlights' => ['Wildlife experiences', 'Cultural landmarks', 'Scenic landscapes'],
                'is_featured' => $featured,
                'status' => 'published',
            ]
        );

        $tour->itineraries()->delete();
        for ($day = 1; $day <= $days; $day++) {
            $tour->itineraries()->create([
                'day_number' => $day,
                'title' => "Day {$day} Experience",
                'description' => 'Detailed day plan will be confirmed at booking stage based on seasonal routing and preferences.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Hotel (or similar)',
            ]);
        }
    }
}
