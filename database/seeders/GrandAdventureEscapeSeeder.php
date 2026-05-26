<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class GrandAdventureEscapeSeeder extends Seeder
{
    /**
     * Seed Sri Lanka Grand Adventure Escape itinerary (15 days / 14 nights).
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'grand-adventure-escapes'],
            [
                'name' => 'Grand Adventure Escapes',
                'description' => 'Luxury Sri Lanka journeys blending culture, adventure, highlands, wildlife, and coastal relaxation.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '15-day-sri-lanka-grand-adventure-escape'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Sri Lanka Grand Adventure Escape (15 Days / 14 Nights)',
                'short_description' => 'Luxury journey through culture, white-water adventure, highlands, wildlife, and the southern coast.',
                'description' => 'A premium 15-day island circuit covering Colombo, Sigiriya, Kandy, Kitulgala, Nuwara Eliya, Ella, Yala, and the southern coast with curated heritage visits, soft-adventure activities, and luxury stays.',
                'featured_image' => 'tours/sri-lanka-grand-adventure-escape.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/colombo.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/kitulgala.jpg',
                    'tours/sri-lanka/nuwara-eliya.jpg',
                    'tours/sri-lanka/ella.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/galle.jpg',
                ],
                'duration_days' => 15,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Breakfast and Dinner daily, with Dinner on arrival day and Breakfast on departure day',
                'max_group_size' => 12,
                'price_per_person' => 0,
                'difficulty' => 'Moderate',
                'included' => [
                    'Airport meet and assist by Transco Travels representative',
                    'Private transfers throughout itinerary',
                    '14 nights accommodation in 4/5-star hotels or similar',
                    'Daily meals as listed in itinerary (B, D)',
                    'Chauffeur-guide support',
                    'Sigiriya Rock Fortress visit',
                    'Dambulla Cave Temple visit',
                    'Temple of the Sacred Tooth Relic visit',
                    'Royal Botanical Gardens Peradeniya visit',
                    'Horton Plains excursion',
                    'White-water rafting in Kitulgala',
                    'Yala safari experience',
                    'Galle Fort guided walk',
                ],
                'excluded' => [
                    'International flights and visa fees',
                    'Lunches unless otherwise specified',
                    'Optional activities and upgrades not listed as included',
                    'Personal expenses and beverages',
                    'Tips and gratuities',
                    'Early check-in and late check-out charges',
                ],
                'highlights' => [
                    'Luxury arrival and Colombo city introduction',
                    'Cultural Triangle heritage exploration',
                    'Flexible heritage or safari day in Sigiriya region',
                    'Kandy temple and botanical experiences',
                    'Rainforest transition and Kitulgala adventure',
                    'White-water rafting on Kelani River',
                    'Tea-country scenic sectors through Nuwara Eliya and Ella',
                    'Yala wildlife safari and leopard-country landscapes',
                    'Galle Fort and refined southern coast ending',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Colombo', 'hotel' => 'Shangri-La Colombo / Galle Face Hotel / Cinnamon Red Colombo', 'room' => 'Deluxe Room'],
                    ['destination' => 'Habarana / Sigiriya', 'hotel' => 'Jetwing Vil Uyana / Cinnamon Lodge Habarana / Habarana Village by Cinnamon / Aliya Resort & Spa', 'room' => 'Deluxe Room'],
                    ['destination' => 'Kandy', 'hotel' => 'Earl\'s Regency / Kings Pavilion / Theva Residency / Amaya Hills', 'room' => 'Deluxe Room'],
                    ['destination' => 'Kitulgala', 'hotel' => 'Palmstone Retreat / Rafters Retreat / Borderlands Eco Adventure Resort / Plantation Hotel', 'room' => 'Deluxe Room'],
                    ['destination' => 'Nuwara Eliya', 'hotel' => 'Heritance Tea Factory / Grand Hotel / Jetwing St. Andrew\'s / Araliya Green Hills', 'room' => 'Deluxe Room'],
                    ['destination' => 'Ella', 'hotel' => '98 Acres Resort & Spa / Nine Skies / EKHO Ella / Morning Dew Boutique Hotel', 'room' => 'Deluxe Room'],
                    ['destination' => 'Yala', 'hotel' => 'Jetwing Yala / Uga Chena Huts / Cinnamon Wild Yala / EKHO Safari Tissa', 'room' => 'Deluxe Room'],
                    ['destination' => 'Southern Coast', 'hotel' => 'Cape Weligama / Anantara Peace Haven Tangalle / Jetwing Lighthouse / The Fortress Resort & Spa', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => 'Rates on request',
                        'rates' => [
                            ['group' => 'Custom quote', 'price' => 0],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Client-ready balanced route pacing with culture, adventure, and leisure',
                    'Private transfer comfort across all sectors',
                ],
                'other_conditions' => [
                    'Train segment options are subject to seat availability and operating schedules.',
                    'Safari park routing may be adjusted for best seasonal wildlife sightings.',
                    'Hotel substitutions may apply while preserving quality and journey flow.',
                ],
                'general_reminders' => [
                    'Road travel times can vary due to weather and traffic conditions.',
                    'Active sectors such as rafting and hiking require suitable footwear and fitness readiness.',
                    'Temple visits require respectful dress and possible footwear removal.',
                ],
                'hotel_rules' => 'Standard check-in and check-out policies vary by hotel and are subject to each property’s rules.',
                'alcohol_policy' => 'Alcohol service may be restricted in certain public areas during religious holidays.',
                'attire_policy' => 'Decent clothing is required at religious sites. Shorts and sleeveless tops are not accepted in sacred areas.',
                'blackout_notes' => 'Peak-season supplements may apply for selected hotels and travel windows.',
                'extra_supplements' => [
                    'Specialist guides and premium room upgrades are available on request.',
                ],
                'meta_title' => 'Sri Lanka Grand Adventure Escape | 15 Days / 14 Nights',
                'meta_description' => 'Luxury Sri Lanka journey through culture, rafting adventure, tea highlands, wildlife safaris, and southern coast indulgence.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo',
                'description' => 'Airport welcome and private transfer to Colombo with relaxed first-day city orientation based on arrival timing.',
                'meals' => 'Dinner',
                'accommodation' => 'Colombo',
            ],
            [
                'day_number' => 2,
                'title' => 'Colombo to Habarana / Sigiriya',
                'description' => 'Scenic transfer into the Cultural Triangle and evening at leisure in nature-based resort surroundings.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Habarana / Sigiriya',
            ],
            [
                'day_number' => 3,
                'title' => 'Sigiriya Rock Fortress and Rural Experience',
                'description' => 'Morning Sigiriya ascent followed by soft local village and reservoir experiences in the afternoon.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Habarana / Sigiriya',
            ],
            [
                'day_number' => 4,
                'title' => 'Polonnaruwa or Minneriya / Kaudulla Safari',
                'description' => 'Flexible day for either medieval heritage exploration in Polonnaruwa or seasonal safari in Minneriya/Kaudulla/Eco Park.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Habarana / Sigiriya',
            ],
            [
                'day_number' => 5,
                'title' => 'Habarana to Kandy via Dambulla and Matale',
                'description' => 'Visit Dambulla Cave Temple and continue to Kandy with optional spice-garden stop en route.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 6,
                'title' => 'Kandy Heritage and City Experience',
                'description' => 'Temple of the Sacred Tooth Relic, city orientation, and Peradeniya Royal Botanical Gardens.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Kandy',
            ],
            [
                'day_number' => 7,
                'title' => 'Kandy to Kitulgala',
                'description' => 'Transfer into lush rainforest valley environment and enjoy a gentle nature-based afternoon.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Kitulgala',
            ],
            [
                'day_number' => 8,
                'title' => 'Kitulgala Rafting and Transfer to Nuwara Eliya',
                'description' => 'Guided white-water rafting on Kelani River followed by scenic mountain transfer into tea country.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Nuwara Eliya',
            ],
            [
                'day_number' => 9,
                'title' => 'Horton Plains and Nuwara Eliya',
                'description' => 'Early excursion to Horton Plains and World’s End viewpoint, then relaxed afternoon in Nuwara Eliya.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Nuwara Eliya',
            ],
            [
                'day_number' => 10,
                'title' => 'Nuwara Eliya to Ella',
                'description' => 'Scenic highland transfer by road or partial rail segment to Ella with Nine Arches area visit.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Ella',
            ],
            [
                'day_number' => 11,
                'title' => 'Ella Adventure Day',
                'description' => 'Soft-adventure day with options such as Little Adam’s Peak, zipline, estate walk, or relaxed scenic exploration.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Ella',
            ],
            [
                'day_number' => 12,
                'title' => 'Ella to Yala',
                'description' => 'Descend from highlands to dry-zone wilderness and settle in safari lodge setting near Yala.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yala',
            ],
            [
                'day_number' => 13,
                'title' => 'Yala National Park Safari Experience',
                'description' => 'Primary wildlife day featuring morning safari and optional second game-drive session.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yala',
            ],
            [
                'day_number' => 14,
                'title' => 'Yala to Galle / Southern Coast',
                'description' => 'Transfer west along coast, guided Galle Fort exploration, and luxury southern coast stay.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Southern Coast',
            ],
            [
                'day_number' => 15,
                'title' => 'Southern Coast Leisure and Departure Transfer',
                'description' => 'Final morning by the sea and private transfer to Colombo or airport for departure.',
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
