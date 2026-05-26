<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class WildlifeHeritageTourSeeder extends Seeder
{
    /**
     * Seed the 13-day Sri Lanka Wildlife and Heritage tour.
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'wildlife-heritage-tours'],
            [
                'name' => 'Wildlife & Heritage Tours',
                'description' => 'Private guided wildlife and heritage experiences across Sri Lanka with safaris and cultural landmarks.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '13-day-sri-lanka-wildlife-heritage-half-board'],
            [
                'tour_category_id' => $category->id,
                'title' => '13-Day Sri Lanka Wildlife & Heritage Tour (Half Board)',
                'short_description' => 'A private guided 13-day Sri Lanka tour featuring wildlife safaris, cultural heritage landmarks, rainforest experiences, and south coast leisure.',
                'description' => 'This 13-day private guided journey covers Negombo, Anuradhapura, Kandy, Sinharaja, Udawalawe, Yala, and Galle with half-board accommodation, safaris, transfers, and curated cultural excursions.',
                'featured_image' => 'tours/sri-lanka-wildlife-heritage.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/negombo.jpg',
                    'tours/sri-lanka/wilpattu.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 13,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Half Board (Breakfast & Dinner daily)',
                'max_group_size' => 12,
                'price_per_person' => 2080,
                'difficulty' => 'Easy',
                'included' => [
                    'Meet and greet service at Bandaranaike International Airport by travel representative',
                    '12 nights accommodation at listed hotels on half board basis',
                    'Transport in an air-conditioned vehicle',
                    'Services of a professional English-speaking guide',
                    'All current hotel taxes and service charges',
                    'All relevant sightseeing entrance fees as listed',
                    'Temple of the Tooth Kandy',
                    'Cultural show',
                    'Yala National Park entrance and jeep safari',
                    'Wilpattu National Park entrance and jeep safari',
                    'Udawalawe National Park entrance and jeep safari',
                    'Udawalawe Transit Home',
                    'Turtle Hatchery',
                    'Anuradhapura heritage site access',
                    'Stilt fishing visit',
                    'Galle Fort Museum entry',
                    'Dutch Canal boat ride',
                    'Sinharaja Rainforest Reserve entry',
                    'Lunugamwehera National Park entrance and safari',
                    'Bundala National Park entrance and safari',
                    'Whale watching',
                ],
                'excluded' => [
                    'Optional excursions if mentioned as optional',
                    'Beverages throughout the tour',
                    'Any meal not specified',
                    'Personal expenses',
                    'Any other services not specified',
                    'Tips and gratuities',
                    'Early check-in and late check-out from hotels',
                ],
                'highlights' => [
                    'Negombo Lagoon boat ride through mangroves and birdlife',
                    'Wilpattu wildlife safaris',
                    'Ancient city of Anuradhapura',
                    'Royal Botanical Gardens and Temple of the Tooth in Kandy',
                    'Sinharaja rainforest birding',
                    'Udawalawe elephant and wildlife safaris',
                    'Yala full-day safari experiences',
                    'Bundala biosphere and migratory bird habitats',
                    'Weligama stilt fishing stop',
                    'Galle Dutch Fort and coastal heritage',
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
                    'Sea shells garlands',
                    'Two 500ml water bottles per day per person',
                ],
                'other_conditions' => [
                    'Optional excursions and additional services can be provided at extra charge.',
                    'Visits to wildlife parks are at client risk.',
                    'Safari vehicles are basic non-air-conditioned with basic insurance cover.',
                ],
                'general_reminders' => [
                    'Program is based on hotel room availability at quotation time.',
                    'Hotels accept only confirmed bookings during high demand periods.',
                    'Final confirmation is shared with relevant overnight stays and final itinerary.',
                    'Price fluctuations due to hotel changes may require revised quotation.',
                ],
                'hotel_rules' => 'Official check-in at hotels is generally 12:00-14:00 depending on hotel and official check-out is 11:00.',
                'alcohol_policy' => 'Alcohol is not served in public areas in hotels and restaurants during religious holidays.',
                'attire_policy' => 'Visitors must wear appropriate clothing at religious places. Shorts and sleeveless tops are not accepted. Hats, caps, shoes, and slippers must be removed where required.',
                'blackout_notes' => 'Blackout period: 20 Dec 2025 - 10 Jan 2026. Perahara supplement in Kandy: USD 80 per room per night from 01 Jul 2026 - 31 Aug 2026.',
                'extra_supplements' => [
                    'Perahara supplement in Kandy: USD 80 per room per night (01 Jul 2026 - 31 Aug 2026).',
                ],
                'meta_title' => '13-Day Sri Lanka Wildlife & Heritage Tour (Half Board)',
                'meta_description' => 'Private 13-day Sri Lanka wildlife and heritage itinerary with safaris, UNESCO landmarks, rainforest experiences, and half-board accommodation.',
                'is_featured' => true,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo - Transfer to Negombo',
                'description' => 'Arrival at airport, welcome by guide, transfer to Negombo, leisure, and evening Negombo Lagoon boat ride among mangroves and birdlife.',
                'meals' => 'Dinner',
                'accommodation' => 'Jetwing Beach (or similar)',
            ],
            [
                'day_number' => 2,
                'title' => 'Negombo - Wilpattu - Anuradhapura',
                'description' => 'Drive to Wilpattu National Park for afternoon game drive, then continue to Anuradhapura.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'The Lake Forest (or similar)',
            ],
            [
                'day_number' => 3,
                'title' => 'Anuradhapura & Wilpattu',
                'description' => 'Morning Wilpattu safari and afternoon guided city tour of Anuradhapura ruins, stupas, monasteries, and stone monuments.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'The Lake Forest (or similar)',
            ],
            [
                'day_number' => 4,
                'title' => 'Anuradhapura - Kandy',
                'description' => 'Drive to Kandy, visit Royal Botanical Gardens Peradeniya, and evening Temple of the Tooth Relic visit.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Cinnamon Citadel (or similar)',
            ],
            [
                'day_number' => 5,
                'title' => 'Kandy - Sinharaja Rainforest',
                'description' => 'Travel to Sinharaja Rainforest Reserve and enjoy guided evening bird-watching for endemic species.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'The Rainforest Ecolodge (or similar)',
            ],
            [
                'day_number' => 6,
                'title' => 'Sinharaja - Udawalawe',
                'description' => 'Morning bird walk in Sinharaja, then drive to Udawalawe and visit Elephant Transit Home.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Grand Udawalawe Safari Resort (or similar)',
            ],
            [
                'day_number' => 7,
                'title' => 'Udawalawe National Park',
                'description' => 'Morning and afternoon jeep safaris in Udawalawe to observe elephants and other wildlife.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Grand Udawalawe Safari Resort (or similar)',
            ],
            [
                'day_number' => 8,
                'title' => 'Udawalawe - Lunugamwehera - Yala',
                'description' => 'Drive to Lunugamwehera for safari and continue onward to Yala National Park.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Cinnamon Wild (or similar)',
            ],
            [
                'day_number' => 9,
                'title' => 'Yala National Park',
                'description' => 'Full-day Yala exploration with morning and afternoon safaris across forest, grassland, and lagoon habitats.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Cinnamon Wild (or similar)',
            ],
            [
                'day_number' => 10,
                'title' => 'Yala - Bundala - Weligama - Galle',
                'description' => 'Visit Bundala National Park, stop for stilt fishing at Weligama, then continue to Galle.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Le Grand Galle (or similar)',
            ],
            [
                'day_number' => 11,
                'title' => 'Galle & Surroundings',
                'description' => 'Optional Mirissa whale watching or cycling route, turtle hatchery visit, and evening walking tour of Galle Fort.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Le Grand Galle (or similar)',
            ],
            [
                'day_number' => 12,
                'title' => 'Galle - Leisure Day',
                'description' => 'Leisure day for beach relaxation, local cafes, boutiques, optional spa, and sunset fort rampart walk.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Le Grand Galle (or similar)',
            ],
            [
                'day_number' => 13,
                'title' => 'Galle - Colombo (Departure)',
                'description' => 'After breakfast, transfer to Colombo Airport for departure.',
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
