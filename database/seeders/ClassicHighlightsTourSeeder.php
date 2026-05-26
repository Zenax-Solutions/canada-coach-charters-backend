<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class ClassicHighlightsTourSeeder extends Seeder
{
    /**
     * Seed tours and itineraries for tourism catalog.
     */
    public function run(): void
    {
        $classic = TourCategory::query()->updateOrCreate(
            ['slug' => 'classic-highlights'],
            [
                'name' => 'Classic Highlights',
                'description' => 'City, culture, hill country, safari, and south coast experiences across Sri Lanka.',
            ]
        );

        $baseItinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo - City Tour & Leisure',
                'description' => 'Arrival at Bandaranaike International Airport, transfer to Colombo, guided city tour (Pettah market, Gangaramaya Temple, Independence Square, and Galle Face Green), hotel check-in, and leisure time.',
                'meals' => 'Lunch & Dinner at client cost',
                'accommodation' => 'Colombo (hotel as per package)',
            ],
            [
                'day_number' => 2,
                'title' => 'Colombo - Pinnawala Elephant Orphanage - Sigiriya',
                'description' => 'Breakfast, visit Pinnawala Elephant Orphanage, continue to Dambulla Cave Temple, and transfer to Sigiriya for overnight stay.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'Sigiriya (hotel as per package)',
            ],
            [
                'day_number' => 3,
                'title' => 'Sigiriya - Rock Fortress & Village Experience',
                'description' => 'Early visit to Sigiriya Rock Fortress followed by Hiriwadunna village experience including bullock cart ride, canoe trip, and traditional local meal.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'Sigiriya (hotel as per package)',
            ],
            [
                'day_number' => 4,
                'title' => 'Sigiriya - Kandy via Matale',
                'description' => 'Departure to Kandy via Matale spice garden, visit Temple of the Tooth Relic, and enjoy an evening cultural dance performance.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'Kandy (hotel as per package)',
            ],
            [
                'day_number' => 5,
                'title' => 'Kandy - Nuwara Eliya',
                'description' => 'Scenic drive through tea plantations and hill country to Nuwara Eliya with free time for optional exploration.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'Nuwara Eliya (hotel as per package)',
            ],
            [
                'day_number' => 6,
                'title' => 'Nuwara Eliya - Ella (Scenic Train Ride)',
                'description' => 'Transfer to Ambewela station and board one of Sri Lanka\'s most scenic train journeys to Ella. Transfer to hotel and leisure.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'Ella (hotel as per package)',
            ],
            [
                'day_number' => 7,
                'title' => 'Ella - Yala',
                'description' => 'Travel from Ella to Yala and enjoy a relaxed day near the national park with optional nature-focused activities.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'Yala (hotel as per package)',
            ],
            [
                'day_number' => 8,
                'title' => 'Yala - Safari & South Coast',
                'description' => 'Early morning jeep safari in Yala National Park, then continue to the south coast with a stop at historic Galle Dutch Fort.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'South Beach (hotel as per package)',
            ],
            [
                'day_number' => 9,
                'title' => 'South Coast - Leisure & Excursions',
                'description' => 'Visit turtle hatchery and enjoy a Madu Ganga boat safari through mangroves and island scenery. Return for beach leisure.',
                'meals' => 'Breakfast at hotel / Lunch & Dinner at client cost',
                'accommodation' => 'South Beach (hotel as per package)',
            ],
            [
                'day_number' => 10,
                'title' => 'Departure',
                'description' => 'Breakfast and transfer to the airport for departure with memorable experiences from Sri Lanka.',
                'meals' => 'Breakfast at hotel',
                'accommodation' => null,
            ],
        ];

        $commonIncluded = [
            'Meet & greet service at Bandaranaike International Airport by travel representative',
            '09 nights accommodation at listed hotels on the specified meal plan',
            'Transport in an air-conditioned vehicle',
            '01-02 Pax: Sedan Car',
            '03-04 Pax: Flat Roof Compact Van',
            '05-06 Pax: High Roof Van',
            '07-10 Pax: Mini Coach',
            'Services of a professional English-speaking chauffeur guide',
            'All current taxes and hotel service charges',
            'All entrances to sights mentioned in itinerary',
        ];

        $commonExcluded = [
            'Optional excursions mentioned in itinerary',
            'Beverages throughout tour',
            'Any meal not specified',
            'Personal expenses',
            'Any other services not specified',
            'Tips and gratuities',
            'Early check-in and late check-out from hotels',
        ];

        $commonHighlights = [
            'Colombo city tour with cultural and colonial highlights',
            'Pinnawala Elephant Orphanage and Dambulla Cave Temple',
            'Sigiriya Rock Fortress and Hiriwadunna village immersion',
            'Temple of the Tooth and Kandyan cultural performance',
            'Scenic hill country and iconic Ella train journey',
            'Yala jeep safari and Galle Dutch Fort experience',
            'Turtle hatchery and Madu Ganga mangrove boat ride',
        ];

        $commonComplements = [
            'Sea shell garlands',
            'Two 500ml water bottles per person per day',
        ];

        $commonOtherConditions = [
            'Optional excursions and additional services are chargeable.',
            'Visits to wildlife parks are at client\'s own risk.',
            'Safari vehicles are basic, non-air-conditioned, with basic insurance cover.',
        ];

        $commonReminders = [
            'Programme and rooming are subject to hotel availability at booking time.',
            'Hotels accept only confirmed bookings due to occupancy and demand.',
            'Final confirmation includes confirmed overnight stays and final itinerary.',
            'A revised quotation may apply if hotel substitutions cause price changes.',
        ];

        $tour4Star = Tour::query()->updateOrCreate(
            ['slug' => '10-day-sri-lanka-classic-highlights-4-star'],
            [
                'tour_category_id' => $classic->id,
                'title' => '10-Day Sri Lanka Classic Highlights Tour (4 Star)',
                'short_description' => 'A 10-day Sri Lanka journey covering Colombo, Sigiriya, Kandy, Nuwara Eliya, Ella, Yala, and the South Coast with 4-star stays.',
                'description' => 'This 10-day guided itinerary blends culture, heritage, hill country landscapes, wildlife safari, and beach-side relaxation with 4-star accommodation and private transport.',
                'featured_image' => 'tours/sri-lanka-classic-4-star.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/colombo.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 10,
                'start_location' => 'Colombo Airport, Sri Lanka',
                'end_location' => 'Colombo Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Breakfast at hotel; lunch and dinner at client cost',
                'max_group_size' => 10,
                'price_per_person' => 743,
                'difficulty' => 'Easy',
                'included' => $commonIncluded,
                'excluded' => $commonExcluded,
                'highlights' => $commonHighlights,
                'accommodation_chart' => [
                    ['destination' => 'Colombo', 'hotel' => 'Morven Colombo', 'room' => 'Deluxe Room'],
                    ['destination' => 'Sigiriya', 'hotel' => 'Pinthaliya Resort', 'room' => 'Superior Room'],
                    ['destination' => 'Kandy', 'hotel' => 'Grand Kandyan', 'room' => 'Deluxe Room'],
                    ['destination' => 'Nuwara Eliya', 'hotel' => 'Araliya Red', 'room' => 'Deluxe Room'],
                    ['destination' => 'Ella', 'hotel' => '88 Ella', 'room' => 'Deluxe Room'],
                    ['destination' => 'Yala', 'hotel' => 'Elephant Reach', 'room' => 'Deluxe Room'],
                    ['destination' => 'South Beach', 'hotel' => 'Club Bentota', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => '01 May 2026 - 30 Jun 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 865],
                            ['group' => '03-04 Pax (Double)', 'price' => 751],
                            ['group' => '05-06 Pax (Double)', 'price' => 743],
                            ['group' => '01 Pax (Single)', 'price' => 1421],
                            ['group' => '02 Pax (Single)', 'price' => 1198],
                            ['group' => '03-04 Pax (Single)', 'price' => 1098],
                            ['group' => '05-06 Pax (Single)', 'price' => 984],
                            ['group' => '07-10 Pax (Single)', 'price' => 975],
                            ['group' => '03-04 Pax (Triple)', 'price' => 796],
                            ['group' => '05-06 Pax (Triple)', 'price' => 682],
                            ['group' => '07-10 Pax (Triple)', 'price' => 674],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 Jul 2026 - 31 Aug 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 910],
                            ['group' => '03-04 Pax (Double)', 'price' => 796],
                            ['group' => '05-06 Pax (Double)', 'price' => 788],
                            ['group' => '01 Pax (Single)', 'price' => 1511],
                            ['group' => '02 Pax (Single)', 'price' => 1288],
                            ['group' => '03-04 Pax (Single)', 'price' => 1188],
                            ['group' => '05-06 Pax (Single)', 'price' => 1074],
                            ['group' => '07-10 Pax (Single)', 'price' => 1065],
                            ['group' => '03-04 Pax (Triple)', 'price' => 826],
                            ['group' => '05-06 Pax (Triple)', 'price' => 712],
                            ['group' => '07-10 Pax (Triple)', 'price' => 704],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 Sep 2026 - 31 Oct 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 865],
                            ['group' => '03-04 Pax (Double)', 'price' => 751],
                            ['group' => '05-06 Pax (Double)', 'price' => 743],
                            ['group' => '01 Pax (Single)', 'price' => 1421],
                            ['group' => '02 Pax (Single)', 'price' => 1198],
                            ['group' => '03-04 Pax (Single)', 'price' => 1098],
                            ['group' => '05-06 Pax (Single)', 'price' => 984],
                            ['group' => '07-10 Pax (Single)', 'price' => 975],
                            ['group' => '03-04 Pax (Triple)', 'price' => 796],
                            ['group' => '05-06 Pax (Triple)', 'price' => 682],
                            ['group' => '07-10 Pax (Triple)', 'price' => 674],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 Nov 2026 - 19 Dec 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 963],
                            ['group' => '03-04 Pax (Double)', 'price' => 849],
                            ['group' => '05-06 Pax (Double)', 'price' => 840],
                            ['group' => '01 Pax (Single)', 'price' => 1618],
                            ['group' => '02 Pax (Single)', 'price' => 1393],
                            ['group' => '03-04 Pax (Single)', 'price' => 1293],
                            ['group' => '05-06 Pax (Single)', 'price' => 1179],
                            ['group' => '07-10 Pax (Single)', 'price' => 1170],
                            ['group' => '03-04 Pax (Triple)', 'price' => 861],
                            ['group' => '05-06 Pax (Triple)', 'price' => 747],
                            ['group' => '07-10 Pax (Triple)', 'price' => 739],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '11 Jan 2027 - 31 Mar 2027',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 963],
                            ['group' => '03-04 Pax (Double)', 'price' => 849],
                            ['group' => '05-06 Pax (Double)', 'price' => 840],
                            ['group' => '01 Pax (Single)', 'price' => 1618],
                            ['group' => '02 Pax (Single)', 'price' => 1393],
                            ['group' => '03-04 Pax (Single)', 'price' => 1293],
                            ['group' => '05-06 Pax (Single)', 'price' => 1179],
                            ['group' => '07-10 Pax (Single)', 'price' => 1170],
                            ['group' => '03-04 Pax (Triple)', 'price' => 861],
                            ['group' => '05-06 Pax (Triple)', 'price' => 747],
                            ['group' => '07-10 Pax (Triple)', 'price' => 739],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => $commonComplements,
                'other_conditions' => $commonOtherConditions,
                'general_reminders' => $commonReminders,
                'hotel_rules' => 'Official check-in at hotels is generally between 12:00 and 14:00 (depending on hotel). Official check-out is generally at 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Visitors should wear respectful clothing at religious sites. Shorts and sleeveless tops are not accepted, and shoes/slippers should be removed at sacred premises.',
                'blackout_notes' => 'High peak blackout period: 20 Dec 2026 to 10 Jan 2027. Rates available on case-by-case basis.',
                'extra_supplements' => [
                    'Compulsory Perahara supplement in Kandy: USD 75 per room per night (01 Jul 2026 - 31 Aug 2026).',
                    'Spanish-speaking guide or chauffeur guide supplement: USD 1000 per tour.',
                ],
                'meta_title' => '10-Day Sri Lanka Classic Highlights Tour Package (4 Star)',
                'meta_description' => '10-day Sri Lanka private guided package with culture, hill country, safari, and south coast stays in 4-star hotels.',
                'is_featured' => true,
                'status' => 'published',
            ]
        );

        $tour5Star = Tour::query()->updateOrCreate(
            ['slug' => '10-day-sri-lanka-classic-highlights-5-star'],
            [
                'tour_category_id' => $classic->id,
                'title' => '10-Day Sri Lanka Classic Highlights Tour (5 Star)',
                'short_description' => 'A premium 10-day Sri Lanka journey with 5-star stays covering Colombo, Sigiriya, Kandy, hill country, safari, and the south coast.',
                'description' => 'This 10-day premium itinerary combines culture, mountain rail journey, wildlife safari, and coastal relaxation with curated 5-star accommodation and private transport.',
                'featured_image' => 'tours/sri-lanka-classic-5-star.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/colombo.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 10,
                'start_location' => 'Colombo Airport, Sri Lanka',
                'end_location' => 'Colombo Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Breakfast at hotel; lunch and dinner at client cost',
                'max_group_size' => 10,
                'price_per_person' => 964,
                'difficulty' => 'Easy',
                'included' => $commonIncluded,
                'excluded' => $commonExcluded,
                'highlights' => $commonHighlights,
                'accommodation_chart' => [
                    ['destination' => 'Colombo', 'hotel' => 'Cinnamon Lakeside', 'room' => 'Superior Room'],
                    ['destination' => 'Sigiriya', 'hotel' => 'Aliya Resort & Spa', 'room' => 'Deluxe Room'],
                    ['destination' => 'Kandy', 'hotel' => 'Golden Crown', 'room' => 'Deluxe Room'],
                    ['destination' => 'Nuwara Eliya', 'hotel' => 'Araliya Green City', 'room' => 'Deluxe Room'],
                    ['destination' => 'Ella', 'hotel' => 'Newburgh Ella - The Tea Factory Resort', 'room' => 'Deluxe Room'],
                    ['destination' => 'Yala', 'hotel' => 'DoubleTree by Hilton Weerawila Rajawarna Resort', 'room' => 'Garden Terrace Room'],
                    ['destination' => 'South Beach', 'hotel' => 'Royal Palms', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => '01 May 2026 - 30 Jun 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1087],
                            ['group' => '03-04 Pax (Double)', 'price' => 973],
                            ['group' => '05-06 Pax (Double)', 'price' => 964],
                            ['group' => '01 Pax (Single)', 'price' => 1829],
                            ['group' => '02 Pax (Single)', 'price' => 1602],
                            ['group' => '03-04 Pax (Single)', 'price' => 1502],
                            ['group' => '05-06 Pax (Single)', 'price' => 1388],
                            ['group' => '07-10 Pax (Single)', 'price' => 1379],
                            ['group' => '03-04 Pax (Triple)', 'price' => 1009],
                            ['group' => '05-06 Pax (Triple)', 'price' => 895],
                            ['group' => '07-10 Pax (Triple)', 'price' => 886],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 Jul 2026 - 31 Aug 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1202],
                            ['group' => '03-04 Pax (Double)', 'price' => 1088],
                            ['group' => '05-06 Pax (Double)', 'price' => 1079],
                            ['group' => '01 Pax (Single)', 'price' => 2061],
                            ['group' => '02 Pax (Single)', 'price' => 1832],
                            ['group' => '03-04 Pax (Single)', 'price' => 1732],
                            ['group' => '05-06 Pax (Single)', 'price' => 1618],
                            ['group' => '07-10 Pax (Single)', 'price' => 1609],
                            ['group' => '03-04 Pax (Triple)', 'price' => 1086],
                            ['group' => '05-06 Pax (Triple)', 'price' => 972],
                            ['group' => '07-10 Pax (Triple)', 'price' => 963],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 Sep 2026 - 31 Oct 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1107],
                            ['group' => '03-04 Pax (Double)', 'price' => 993],
                            ['group' => '05-06 Pax (Double)', 'price' => 984],
                            ['group' => '01 Pax (Single)', 'price' => 1869],
                            ['group' => '02 Pax (Single)', 'price' => 1642],
                            ['group' => '03-04 Pax (Single)', 'price' => 1542],
                            ['group' => '05-06 Pax (Single)', 'price' => 1428],
                            ['group' => '07-10 Pax (Single)', 'price' => 1419],
                            ['group' => '03-04 Pax (Triple)', 'price' => 1022],
                            ['group' => '05-06 Pax (Triple)', 'price' => 908],
                            ['group' => '07-10 Pax (Triple)', 'price' => 900],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '01 Nov 2026 - 19 Dec 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1277],
                            ['group' => '03-04 Pax (Double)', 'price' => 1163],
                            ['group' => '05-06 Pax (Double)', 'price' => 1154],
                            ['group' => '01 Pax (Single)', 'price' => 2194],
                            ['group' => '02 Pax (Single)', 'price' => 1964],
                            ['group' => '03-04 Pax (Single)', 'price' => 1864],
                            ['group' => '05-06 Pax (Single)', 'price' => 1750],
                            ['group' => '07-10 Pax (Single)', 'price' => 1741],
                            ['group' => '03-04 Pax (Triple)', 'price' => 1151],
                            ['group' => '05-06 Pax (Triple)', 'price' => 1037],
                            ['group' => '07-10 Pax (Triple)', 'price' => 1029],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '11 Jan 2027 - 31 Mar 2027',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1342],
                            ['group' => '03-04 Pax (Double)', 'price' => 1228],
                            ['group' => '05-06 Pax (Double)', 'price' => 1219],
                            ['group' => '01 Pax (Single)', 'price' => 2326],
                            ['group' => '02 Pax (Single)', 'price' => 2094],
                            ['group' => '03-04 Pax (Single)', 'price' => 1994],
                            ['group' => '05-06 Pax (Single)', 'price' => 1880],
                            ['group' => '07-10 Pax (Single)', 'price' => 1871],
                            ['group' => '03-04 Pax (Triple)', 'price' => 1197],
                            ['group' => '05-06 Pax (Triple)', 'price' => 1083],
                            ['group' => '07-10 Pax (Triple)', 'price' => 1075],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => $commonComplements,
                'other_conditions' => $commonOtherConditions,
                'general_reminders' => $commonReminders,
                'hotel_rules' => 'Official check-in at hotels is generally between 12:00 and 14:00 (depending on hotel). Official check-out is generally at 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Visitors should wear respectful clothing at religious sites. Shorts and sleeveless tops are not accepted, and shoes/slippers should be removed at sacred premises.',
                'blackout_notes' => 'High peak blackout period: 20 Dec 2026 to 10 Jan 2027. Rates available on case-by-case basis.',
                'extra_supplements' => [
                    'Compulsory Perahara supplement in Kandy: USD 100 per room per night (01 Jul 2026 - 31 Aug 2026).',
                    'Spanish-speaking guide or chauffeur guide supplement: USD 1000 per tour.',
                ],
                'meta_title' => '10-Day Sri Lanka Classic Highlights Tour Package (5 Star)',
                'meta_description' => 'Premium 10-day Sri Lanka itinerary with city highlights, cultural sites, hill country, wildlife safari, and south coast stays in 5-star hotels.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        foreach ([$tour4Star, $tour5Star] as $tour) {
            $tour->itineraries()->delete();

            foreach ($baseItinerary as $day) {
                $tour->itineraries()->create($day);
            }
        }
    }
}
