<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class GrandIslandJourneySeeder extends Seeder
{
    /**
     * Seed Sri Lanka Grand Island Journey (15 Days / 14 Nights).
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'grand-island-journeys'],
            [
                'name' => 'Grand Island Journeys',
                'description' => 'Premium multi-region island journeys across heritage sites, tea country, wildlife zones, and coastal retreats.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '15-day-sri-lanka-grand-island-journey'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Sri Lanka Grand Island Journey (15 Days / 14 Nights)',
                'short_description' => 'A premium round tour through Colombo, Sigiriya, Kandy, tea country, Ella, Yala, Galle, and south-west beach retreat.',
                'description' => 'This 15-day premium Sri Lanka itinerary blends colonial city charm, UNESCO heritage, hill-country tea landscapes, safari country, and coastal indulgence in a balanced and unhurried private guided journey.',
                'featured_image' => 'tours/sri-lanka-grand-island.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/colombo.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/nuwara-eliya.jpg',
                    'tours/sri-lanka/ella.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                    'tours/sri-lanka/bentota.jpg',
                ],
                'duration_days' => 15,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Breakfast & Dinner daily (B, D) except arrival day Dinner only',
                'max_group_size' => 12,
                'price_per_person' => 0,
                'difficulty' => 'Easy',
                'included' => [
                    'Airport meet and greet service',
                    'Private guided round tour with chauffeur-guide',
                    '14 nights accommodation in premium hotels (or similar)',
                    'Daily breakfast and dinner as per itinerary',
                    'Ground transfers in air-conditioned vehicle',
                    'Sigiriya and Polonnaruwa heritage touring',
                    'Minneriya/Kaudulla/Eco Park seasonal safari',
                    'Temple of the Tooth visit in Kandy',
                    'Tea plantation and factory visit',
                    'Yala safari experience',
                    'Galle Fort guided walking experience',
                ],
                'excluded' => [
                    'International flights and visa fees',
                    'Lunches unless otherwise arranged',
                    'Optional experiences not specified as included',
                    'Personal expenses and beverages',
                    'Tips and gratuities',
                    'Early check-in and late check-out charges',
                ],
                'highlights' => [
                    'Colombo orientation and oceanfront sunset',
                    'Cultural Triangle immersion and village experience',
                    'Sigiriya Rock Fortress and Polonnaruwa ruins',
                    'Dambulla cave temple and seasonal elephant safari',
                    'Kandy temple culture and botanical gardens',
                    'Tea country landscapes and highland scenic sector',
                    'Ella viewpoints and leisure in cool-climate hills',
                    'Yala leopard-country wilderness safari',
                    'UNESCO Galle Fort and southern coast elegance',
                    'Final beach retreat in Bentota or Wadduwa',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Colombo', 'hotel' => 'Shangri-La Colombo', 'room' => 'Deluxe Room'],
                    ['destination' => 'Sigiriya/Habarana', 'hotel' => 'Heritance Kandalama', 'room' => 'Deluxe Room'],
                    ['destination' => 'Kandy', 'hotel' => 'The Golden Crown Hotel', 'room' => 'Deluxe Room'],
                    ['destination' => 'Nuwara Eliya', 'hotel' => 'Grand Hotel Nuwara Eliya', 'room' => 'Deluxe Room'],
                    ['destination' => 'Ella', 'hotel' => '98 Acres Resort & Spa', 'room' => 'Deluxe Room'],
                    ['destination' => 'Yala/Tissamaharama', 'hotel' => 'Jetwing Yala', 'room' => 'Deluxe Room'],
                    ['destination' => 'Galle', 'hotel' => 'Le Grand Galle', 'room' => 'Deluxe Room'],
                    ['destination' => 'Bentota/Wadduwa', 'hotel' => 'Taj Bentota Resort & Spa', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => 'On request - tailored by season and hotel selection',
                        'rates' => [
                            ['group' => 'Custom quote', 'price' => 0],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Personalized itinerary pacing with premium route design',
                    'Arrival-day soft landing and orientation support',
                ],
                'other_conditions' => [
                    'Hotel selection may vary by availability while preserving category and journey flow.',
                    'Seasonal wildlife viewing conditions may affect park routing and safari timing.',
                    'Scenic rail segments are subject to seat availability and operational schedules.',
                ],
                'general_reminders' => [
                    'Travel times in hill-country and safari zones vary based on road and weather conditions.',
                    'Guests should carry comfortable footwear and modest attire for temple visits.',
                    'Optional experiences can be customized based on guest pace and interests.',
                ],
                'hotel_rules' => 'Standard check-in and check-out times are applied by each hotel and may vary by property.',
                'alcohol_policy' => 'Alcohol service may be restricted in certain venues during local religious observances.',
                'attire_policy' => 'Appropriate attire is required at religious sites; shoulders and knees should be covered, and footwear removed where requested.',
                'blackout_notes' => 'Peak holiday periods may have supplemental rates and minimum stay requirements.',
                'extra_supplements' => [
                    'Premium room category upgrades available on request.',
                    'Private specialist guide options available on request.',
                ],
                'meta_title' => 'Sri Lanka Grand Island Journey | 15 Days / 14 Nights',
                'meta_description' => 'Premium 15-day Sri Lanka round tour combining heritage, tea country, safari wilderness, Galle Fort, and coastal beach retreat.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo',
                'description' => 'Arrival, airport meet-and-greet, transfer to Colombo, soft-landing rest with optional orientation drive and sunset by Galle Face Green.',
                'meals' => 'Dinner',
                'accommodation' => 'Colombo',
            ],
            [
                'day_number' => 2,
                'title' => 'Colombo to Sigiriya',
                'description' => 'Transfer to Cultural Triangle and afternoon village immersion with local transport element, canoe segment, and culinary encounter.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Sigiriya/Habarana',
            ],
            [
                'day_number' => 3,
                'title' => 'Sigiriya and Polonnaruwa',
                'description' => 'Morning Sigiriya Rock Fortress climb and afternoon UNESCO-influenced medieval capital exploration in Polonnaruwa.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Sigiriya/Habarana',
            ],
            [
                'day_number' => 4,
                'title' => 'Dambulla and Seasonal Safari Option',
                'description' => 'Visit Dambulla Cave Temple and proceed for evening jeep safari in Minneriya, Kaudulla, or Eco Park based on seasonal movement.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Sigiriya/Habarana',
            ],
            [
                'day_number' => 5,
                'title' => 'Sigiriya to Kandy via Matale',
                'description' => 'Scenic transfer to Kandy via Matale spice experience, followed by lake-side city atmosphere and Temple of the Tooth visit.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 6,
                'title' => 'Kandy Immersion',
                'description' => 'Explore Peradeniya Royal Botanical Gardens, curated city and craft experiences, and leisure in Sri Lanka’s last royal capital.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 7,
                'title' => 'Kandy to Nuwara Eliya',
                'description' => 'Drive into tea country with plantation and factory visit, then settle in Nuwara Eliya for a relaxed cool-climate evening.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Nuwara Eliya',
            ],
            [
                'day_number' => 8,
                'title' => 'Nuwara Eliya to Ella',
                'description' => 'Travel to Ella via scenic highland route (or train-based segment when available), with visits to iconic viewpoints including Nine Arches area.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Ella',
            ],
            [
                'day_number' => 9,
                'title' => 'Ella Exploration',
                'description' => 'Leisurely highland day with options for Little Adam’s Peak, Ravana Falls, photography, and wellness downtime.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Ella',
            ],
            [
                'day_number' => 10,
                'title' => 'Ella to Yala',
                'description' => 'Descend from hill country to dry-zone wilderness and settle into safari-lodge environment near Yala.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yala/Tissamaharama',
            ],
            [
                'day_number' => 11,
                'title' => 'Yala National Park Safari',
                'description' => 'Morning safari in Yala with optional second safari session or lodge leisure, focusing on leopard-country habitats and diverse wildlife.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yala/Tissamaharama',
            ],
            [
                'day_number' => 12,
                'title' => 'Yala to Galle via Southern Coast',
                'description' => 'Transfer to Galle and enjoy an atmospheric guided walk through UNESCO-listed fortified city lanes and sunset ramparts.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Galle',
            ],
            [
                'day_number' => 13,
                'title' => 'Galle and Southern Coast Leisure',
                'description' => 'Flexible day for coastal leisure, boutique discovery, optional marine or culinary experiences, and spa downtime.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Galle/South Coast',
            ],
            [
                'day_number' => 14,
                'title' => 'Galle to Bentota/Wadduwa Beach Retreat',
                'description' => 'Continue to final coastal resort for relaxation, beachfront leisure, and gentle conclusion of island circuit.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Bentota/Wadduwa',
            ],
            [
                'day_number' => 15,
                'title' => 'Departure',
                'description' => 'After breakfast, transfer to airport for departure with optional en-route stop based on flight timing.',
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
