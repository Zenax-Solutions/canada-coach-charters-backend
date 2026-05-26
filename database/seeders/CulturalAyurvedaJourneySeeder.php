<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class CulturalAyurvedaJourneySeeder extends Seeder
{
    /**
     * Seed Sri Lanka Cultural and Ayurveda Journey (11 Nights / 12 Days).
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'cultural-ayurveda-journeys'],
            [
                'name' => 'Cultural & Ayurveda Journeys',
                'description' => 'Sri Lanka cultural circuits combined with coastal wellness and Ayurveda experiences.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '12-day-sri-lanka-cultural-ayurveda-journey'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Sri Lanka Cultural & Ayurveda Journey (11 Nights / 12 Days)',
                'short_description' => '7-night cultural round tour plus 4-night beach and Ayurveda wellness retreat in Beruwela.',
                'description' => 'A private guided cultural and wellness journey covering Anuradhapura, Sigiriya, Kandy, Nuwara Eliya, Ella, and Beruwela with heritage exploration, scenic rail travel, and Ayurveda relaxation.',
                'featured_image' => 'tours/sri-lanka-cultural-ayurveda.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/anuradhapura.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/nuwara-eliya.jpg',
                    'tours/sri-lanka/beruwela.jpg',
                ],
                'duration_days' => 12,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Breakfast, Lunch, and Dinner daily (as per itinerary)',
                'max_group_size' => 18,
                'price_per_person' => 1710,
                'difficulty' => 'Easy',
                'included' => [
                    'Meet and greet service at Bandaranaike International Airport by Transco Travel representative',
                    '11 nights accommodation at listed hotels on mentioned meal plan',
                    'Transport in an air-conditioned 33-seater coach',
                    'Services of a professional English-speaking chauffeur guide',
                    'All current taxes and hotel service charges',
                    'All entrances to sights mentioned in itinerary',
                    'Kandy Temple',
                    'Sigiriya Rock Fortress',
                    'Dambulla Cave Temple',
                    'Hiriwaduna Village Safari',
                    'Polonnaruwa',
                    'Anuradhapura',
                    'Train ride (Ambewela to Ella)',
                    'Gregory Lake',
                    'Galle Fort',
                    'Aukana Buddha Statue',
                    'Yapahuwa Rock Fortress',
                    'Sri Muthumariamman Temple',
                ],
                'excluded' => [
                    'Optional excursions mentioned in itinerary',
                    'Madu Ganga boat ride (optional)',
                    'Turtle Hatchery (optional)',
                    'Cost of beverages throughout tour',
                    'Any meal not specified',
                    'Personal expenses',
                    'Any other services not specified above',
                    'Tips and gratuities',
                    'Early check-in and late check-out from hotels',
                ],
                'highlights' => [
                    'Anuradhapura UNESCO ancient capital exploration',
                    'Aukana Buddha Statue',
                    'Yapahuwa Citadel',
                    'Sigiriya Rock Fortress',
                    'Hiriwaduna village culture experience',
                    'Polonnaruwa and Dambulla heritage sites',
                    'Temple of the Tooth and Kandyan heritage',
                    'Tea plantation, factory, and hill country landscapes',
                    'Scenic train ride from Ambewela to Ella',
                    'Galle Dutch Fort and coastal wellness retreat in Beruwela',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Anuradhapura', 'hotel' => 'The Sanctuary at Tissawewa', 'room' => 'Deluxe Room'],
                    ['destination' => 'Sigiriya', 'hotel' => 'Pinthaliya Resort', 'room' => 'Superior Room'],
                    ['destination' => 'Kandy', 'hotel' => 'Grand Kandyan', 'room' => 'Deluxe Room'],
                    ['destination' => 'Nuwara Eliya', 'hotel' => 'Araliya Red', 'room' => 'Deluxe Room'],
                    ['destination' => 'Beruwela', 'hotel' => 'Heritance Ayurveda', 'room' => 'Classic Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => 'November 2026',
                        'rates' => [
                            ['group' => '12-15 Pax (Double)', 'price' => 1760],
                            ['group' => '16-18 Pax (Double)', 'price' => 1710],
                            ['group' => '12-15 Pax (Single)', 'price' => 2315],
                            ['group' => '16-18 Pax (Single)', 'price' => 2265],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Sea shells garlands',
                    'Two 500ml water bottles per person per day',
                ],
                'other_conditions' => [
                    'No triple rooms are available due to Ayurveda resort rooming limits.',
                    'Spanish guide supplement applies per group.',
                    'Optional excursions and additional services are chargeable.',
                    'Visits to wildlife parks are at client risk.',
                    'Safari vehicles (non-air-conditioned) are basic with basic insurance cover.',
                ],
                'general_reminders' => [
                    'Programme is based on hotel room availability at quotation time.',
                    'Hotels accept only confirmed bookings during high demand periods.',
                    'Final confirmation is shared with confirmed overnight stays and itinerary.',
                    'Price fluctuations due to hotel substitutions may require revised quotation.',
                ],
                'hotel_rules' => 'Official check-in at hotels is generally between 12:00 and 14:00 (depending on hotel). Official check-out is generally at 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Visitors should wear decent clothing covering the body at religious places. Shorts and sleeveless tops are not acceptable. Hats, caps, shoes, and slippers should be removed at religious monuments where required.',
                'blackout_notes' => 'Package validity: November 2026 only.',
                'extra_supplements' => [
                    'Spanish guide supplement: USD 1000 per group.',
                    'Optional Turtle Hatchery: USD 05 per person.',
                    'Optional Madu Ganga boat ride: USD 05 per person.',
                ],
                'meta_title' => 'Sri Lanka Cultural & Ayurveda Journey | 11 Nights / 12 Days',
                'meta_description' => 'Private guided 12-day Sri Lanka journey combining UNESCO heritage sites, scenic hill country rail route, and 4-night Ayurveda wellness stay in Beruwela.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival - Transfer to Anuradhapura',
                'description' => 'Arrival, welcome, and transfer to Anuradhapura. Evening at leisure at The Sanctuary at Tissawewa.',
                'meals' => 'Dinner',
                'accommodation' => 'The Sanctuary at Tissawewa (or similar)',
            ],
            [
                'day_number' => 2,
                'title' => 'Anuradhapura - Aukana - Anuradhapura',
                'description' => 'Explore UNESCO-listed Anuradhapura and visit the 12-meter Aukana Buddha Statue, then return for relaxation.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'The Sanctuary at Tissawewa (or similar)',
            ],
            [
                'day_number' => 3,
                'title' => 'Anuradhapura - Yapahuwa - Habarana/Sigiriya',
                'description' => 'Visit Yapahuwa Citadel and continue to Habarana/Sigiriya area for overnight stay.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Pinthaliya Resort (or similar)',
            ],
            [
                'day_number' => 4,
                'title' => 'Sigiriya Rock Fortress - Hiriwaduna Village Experience',
                'description' => 'Climb Sigiriya Rock Fortress and enjoy Hiriwaduna village activities including bullock cart ride, catamaran crossing, and local culinary demonstration.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Pinthaliya Resort (or similar)',
            ],
            [
                'day_number' => 5,
                'title' => 'Polonnaruwa - Dambulla - Kandy',
                'description' => 'Visit Polonnaruwa ruins and Dambulla Cave Temple, then proceed to Kandy with en-route temple and spice garden visits.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Grand Kandyan (or similar)',
            ],
            [
                'day_number' => 6,
                'title' => 'Kandy Exploration',
                'description' => 'Visit Temple of the Sacred Tooth Relic, Royal Botanical Gardens Peradeniya, and evening cultural dance performance.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Grand Kandyan (or similar)',
            ],
            [
                'day_number' => 7,
                'title' => 'Kandy - Nuwara Eliya',
                'description' => 'Travel through hill country with tea plantation and factory visit, scenic viewpoints, and Gregory Lake exploration.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Araliya Red (or similar)',
            ],
            [
                'day_number' => 8,
                'title' => 'Nuwara Eliya - Ella - Beruwela',
                'description' => 'Scenic train ride from Ambewela to Ella, then continue to Beruwela with optional south coast stops including Galle Fort, Turtle Hatchery, and Madu Ganga.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Heritance Ayurveda',
            ],
            [
                'day_number' => 9,
                'title' => 'Beruwela - Ayurveda and Relaxation',
                'description' => 'Wellness day focused on Ayurveda treatments, beach rest, meditation, and rejuvenation.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Heritance Ayurveda',
            ],
            [
                'day_number' => 10,
                'title' => 'Ayurvedic Resort Leisure',
                'description' => 'Continue Ayurveda and wellness program or enjoy leisure at resort and beach.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Heritance Ayurveda',
            ],
            [
                'day_number' => 11,
                'title' => 'Leisure and Healing',
                'description' => 'Final full day for treatments, relaxation, and wellness-focused activities.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => 'Heritance Ayurveda',
            ],
            [
                'day_number' => 12,
                'title' => 'Departure',
                'description' => 'After breakfast, transfer to airport for departure with memorable Sri Lanka experiences.',
                'meals' => 'Breakfast / Lunch / Dinner',
                'accommodation' => null,
            ],
        ];

        $tour->itineraries()->delete();
        foreach ($itinerary as $day) {
            $tour->itineraries()->create($day);
        }
    }
}
