<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class CulinaryTourSeeder extends Seeder
{
    /**
     * Seed Culinary Tour of Sri Lanka (10 Nights / 11 Days).
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'culinary-tours'],
            [
                'name' => 'Culinary Tours',
                'description' => 'Food-focused Sri Lanka journeys blending regional cuisine, market visits, cooking sessions, and cultural landmarks.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '11-day-culinary-tour-of-sri-lanka'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Culinary Tour of Sri Lanka (10 Nights / 11 Days)',
                'short_description' => 'A food-led Sri Lanka journey through Colombo, Negombo, Sigiriya, Kandy, Nuwara Eliya, Ella, and Galle with market visits and cooking experiences.',
                'description' => 'This culinary itinerary combines Sri Lankan street food, seafood traditions, spice gardens, tea culture, and hands-on cooking classes with scenic transfers and heritage stops.',
                'featured_image' => 'tours/sri-lanka-culinary-tour.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/colombo-food.jpg',
                    'tours/sri-lanka/negombo-fish-market.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/nuwara-eliya-tea.jpg',
                    'tours/sri-lanka/ella.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 11,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Bed and Breakfast basis (with optional culinary experiences and meal supplements as listed)',
                'max_group_size' => 45,
                'price_per_person' => 493,
                'difficulty' => 'Easy',
                'included' => [
                    'Meet and greet service at Bandaranaike International Airport by Transco Travel representative',
                    '10 nights accommodation at listed hotels on mentioned meal plan',
                    'Transport in an air-conditioned vehicle',
                    '02 Pax: Sedan',
                    '03-04 Pax: Flat Roof Van',
                    '05-06 Pax: High Roof Van',
                    '07-11 Pax: Mini Coach',
                    '12-25 Pax: 33-Seater Coach',
                    '26-38 Pax: 45-Seater Coach',
                    '39-45 Pax: 51-Seater Coach',
                    'Services of a professional English-speaking chauffeur guide/guide',
                    'All current taxes and hotel service charges',
                ],
                'excluded' => [
                    'All optional excursions mentioned in the itinerary',
                    'Cost of beverages throughout the tour',
                    'All entrances to sights mentioned in the itinerary',
                    'Any meal not specified',
                    'Personal expenses',
                    'Any other services not specified above',
                    'Tips and gratuities',
                    'Early check-in and late check-out from hotels',
                ],
                'highlights' => [
                    'Colombo market and street food tasting experience',
                    'Negombo fish market and seafood-focused culinary stop',
                    'Sigiriya village cooking with traditional techniques',
                    'Matale spice-garden learning experience',
                    'Hands-on Kandy cooking class',
                    'Ceylon tea plantation visit and high-tea session',
                    'Ella scenic route and Nine Arches Bridge',
                    'Galle coastal market and seafood cooking session',
                ],
                'accommodation_chart' => [
                    ['destination' => '5-Star | Colombo', 'hotel' => 'Cinnamon Grand Colombo', 'room' => 'Superior Room'],
                    ['destination' => '5-Star | Negombo', 'hotel' => 'Jetwing Blue', 'room' => 'Deluxe Room'],
                    ['destination' => '5-Star | Sigiriya', 'hotel' => 'Aliya Resort & Spa', 'room' => 'Deluxe Room'],
                    ['destination' => '5-Star | Kandy', 'hotel' => 'The Golden Crown Hotel', 'room' => 'Deluxe Room'],
                    ['destination' => '5-Star | Nuwara Eliya', 'hotel' => 'Araliya Green City Hotel', 'room' => 'Deluxe Room'],
                    ['destination' => '5-Star | Ella', 'hotel' => 'Newburgh Ella - The Tea Factory Resort', 'room' => 'Golden Tip Room'],
                    ['destination' => '5-Star | Galle', 'hotel' => 'Radisson Blu', 'room' => 'Deluxe Ocean View Room'],
                    ['destination' => '4-Star | Colombo', 'hotel' => 'Morven Colombo', 'room' => 'Deluxe Room'],
                    ['destination' => '4-Star | Negombo', 'hotel' => 'Earls Regent Negombo', 'room' => 'Deluxe Room'],
                    ['destination' => '4-Star | Sigiriya', 'hotel' => 'Pinthaliya Resort', 'room' => 'Superior Room'],
                    ['destination' => '4-Star | Kandy', 'hotel' => 'Radisson Kandy', 'room' => 'Deluxe Room'],
                    ['destination' => '4-Star | Nuwara Eliya', 'hotel' => 'Araliya Red', 'room' => 'Deluxe Room'],
                    ['destination' => '4-Star | Ella', 'hotel' => '88th Ella', 'room' => 'Deluxe Room'],
                    ['destination' => '4-Star | Galle', 'hotel' => 'Bilin Tree House', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => '5-Star | 01 May 2026 - 30 Jun 2026 & 01 Sep 2026 - 31 Oct 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1195],
                            ['group' => '03-04 Pax (Double)', 'price' => 1070],
                            ['group' => '05-06 Pax (Double)', 'price' => 940],
                            ['group' => '07-11 Pax (Double)', 'price' => 925],
                            ['group' => '12-25 Pax (Double)', 'price' => 869],
                            ['group' => '26-38 Pax (Double)', 'price' => 807],
                            ['group' => '39-45 Pax (Double)', 'price' => 783],
                        ],
                        'single_supplement' => 565,
                        'triple_reduction' => 105,
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '5-Star | 01 Jul 2026 - 31 Aug 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 1300],
                            ['group' => '03-04 Pax (Double)', 'price' => 1175],
                            ['group' => '05-06 Pax (Double)', 'price' => 1045],
                            ['group' => '07-11 Pax (Double)', 'price' => 1030],
                            ['group' => '12-25 Pax (Double)', 'price' => 974],
                            ['group' => '26-38 Pax (Double)', 'price' => 912],
                            ['group' => '39-45 Pax (Double)', 'price' => 888],
                        ],
                        'single_supplement' => 670,
                        'triple_reduction' => 140,
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '4-Star | 01 May 2026 - 30 Jun 2026 & 01 Sep 2026 - 31 Oct 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 905],
                            ['group' => '03-04 Pax (Double)', 'price' => 780],
                            ['group' => '05-06 Pax (Double)', 'price' => 650],
                            ['group' => '07-11 Pax (Double)', 'price' => 635],
                            ['group' => '12-25 Pax (Double)', 'price' => 579],
                            ['group' => '26-38 Pax (Double)', 'price' => 517],
                            ['group' => '39-45 Pax (Double)', 'price' => 493],
                        ],
                        'single_supplement' => 285,
                        'triple_reduction' => 65,
                        'currency' => 'USD',
                    ],
                    [
                        'label' => '4-Star | 01 Jul 2026 - 31 Aug 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 960],
                            ['group' => '03-04 Pax (Double)', 'price' => 835],
                            ['group' => '05-06 Pax (Double)', 'price' => 705],
                            ['group' => '07-11 Pax (Double)', 'price' => 690],
                            ['group' => '12-25 Pax (Double)', 'price' => 634],
                            ['group' => '26-38 Pax (Double)', 'price' => 572],
                            ['group' => '39-45 Pax (Double)', 'price' => 548],
                        ],
                        'single_supplement' => 340,
                        'triple_reduction' => 82,
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Sea shells garlands',
                    'Two 500ml water bottles per person per day',
                ],
                'other_conditions' => [
                    'Optional excursions and additional services could be provided at additional cost.',
                    'Visits to wildlife parks are at the client\'s own risk.',
                    'Safari vehicles (non-air-conditioned) available are basic with basic insurance cover.',
                ],
                'general_reminders' => [
                    'Program is based on hotel room availability at quotation stage.',
                    'Hotels may accept only confirmed bookings during high occupancy periods.',
                    'Final confirmation is shared with confirmed overnight stays and itinerary.',
                    'Price changes may apply if hotel substitutions are required.',
                ],
                'hotel_rules' => 'Official check-in time at hotels is generally 12:00-14:00 (depending on hotel). Official check-out is 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Visitors should wear decent clothing at religious places. Shorts and sleeveless tops are not acceptable; hats and footwear should be removed where required.',
                'blackout_notes' => 'No specific blackout period provided for this package in given schedule.',
                'extra_supplements' => [
                    'Estimated lunch cost per person per day: USD 15-20.',
                    'Estimated dinner cost per person per day: USD 20-25.',
                    'Day 01 Colombo welcome dinner: USD 10 per person.',
                    'Day 02 Colombo street-food tasting: USD 05 per person.',
                    'Day 02 modern Sri Lankan fusion dinner: USD 15 per person.',
                    'Day 03 Negombo seafood lunch: USD 30 per person.',
                    'Day 04 Hiriwaduna Village with lunch: USD 10 per person.',
                    'Day 05 Matale spice garden with lunch: USD 06 per person.',
                    'Day 06 Kandy cooking class: USD 25 per person.',
                    'Day 07 Nuwara Eliya high tea: USD 30 per person.',
                    'Day 08 Ambewela to Ella train ride: USD 25 per person.',
                    'Day 09 Galle seafood dinner: USD 35 per person.',
                    'Day 10 Galle seafood cooking class: USD 50 per person.',
                    'Total optional supplements package: USD 241 per person.',
                ],
                'meta_title' => 'Culinary Tour of Sri Lanka | 10 Nights / 11 Days',
                'meta_description' => '11-day Sri Lanka culinary journey with market tours, street food tasting, seafood experiences, spice gardens, tea culture, and cooking classes.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo',
                'description' => 'Airport welcome, transfer to Colombo, and evening welcome dinner introducing traditional Sri Lankan cuisine.',
                'meals' => 'Lunch & Dinner at client cost (optional welcome dinner supplement)',
                'accommodation' => 'Colombo',
            ],
            [
                'day_number' => 2,
                'title' => 'Colombo Street Food and Market Tour',
                'description' => 'Guided culinary exploration of Colombo markets and street food hubs, Gangaramaya Temple visit, and evening fusion-cuisine option.',
                'meals' => 'Breakfast',
                'accommodation' => 'Colombo',
            ],
            [
                'day_number' => 3,
                'title' => 'Colombo to Negombo (Seafood Experience)',
                'description' => 'Transfer to Negombo with fish market visit, seafood-focused lunch option, and lagoon experience.',
                'meals' => 'Breakfast',
                'accommodation' => 'Negombo',
            ],
            [
                'day_number' => 4,
                'title' => 'Negombo to Sigiriya (Village Culinary Experience)',
                'description' => 'Travel to Sigiriya for village cooking session using traditional methods and visit Sigiriya Rock Fortress.',
                'meals' => 'Breakfast',
                'accommodation' => 'Sigiriya',
            ],
            [
                'day_number' => 5,
                'title' => 'Sigiriya to Kandy (Spice Garden Experience)',
                'description' => 'Journey to Kandy with Matale spice garden stop, Temple of the Sacred Tooth Relic visit, and cultural performance.',
                'meals' => 'Breakfast',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 6,
                'title' => 'Kandy Cooking Class',
                'description' => 'Local market visit and hands-on cooking class featuring classic Sri Lankan dishes.',
                'meals' => 'Breakfast',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 7,
                'title' => 'Kandy to Nuwara Eliya (Tea Experience)',
                'description' => 'Scenic transfer to Nuwara Eliya with tea plantation and factory learning session plus English-style high tea.',
                'meals' => 'Breakfast',
                'accommodation' => 'Nuwara Eliya',
            ],
            [
                'day_number' => 8,
                'title' => 'Nuwara Eliya to Ella',
                'description' => 'Tea-country drive (and optional train segment) to Ella, with Nine Arches Bridge and tea/snack stop.',
                'meals' => 'Breakfast',
                'accommodation' => 'Ella',
            ],
            [
                'day_number' => 9,
                'title' => 'Ella to Galle',
                'description' => 'Travel south to Galle with fort exploration and optional seafood dinner on the coast.',
                'meals' => 'Breakfast',
                'accommodation' => 'Galle',
            ],
            [
                'day_number' => 10,
                'title' => 'Galle Coastal Culinary Experience',
                'description' => 'Coastal market visit and seafood cooking class featuring regional specialties, followed by sunset fort dinner option.',
                'meals' => 'Breakfast',
                'accommodation' => 'Galle',
            ],
            [
                'day_number' => 11,
                'title' => 'Galle to Departure',
                'description' => 'After breakfast, transfer to Bandaranaike International Airport for departure.',
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
