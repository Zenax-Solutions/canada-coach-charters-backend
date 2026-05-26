<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class TravelProposalSeeder extends Seeder
{
    /**
     * Seed Sri Lanka Travel Proposal itinerary.
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'travel-proposals'],
            [
                'name' => 'Travel Proposals',
                'description' => 'Custom Sri Lanka itinerary proposals with detailed routing, accommodation, and guided experiences.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '16-day-sri-lanka-travel-proposal'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Sri Lanka Travel Proposal (16 Days)',
                'short_description' => 'A 16-day Sri Lanka journey through Negombo, Sigiriya, Kandy, Nuwara Eliya, Ella, Yala, Udawalawe, Galle, and Colombo.',
                'description' => 'A balanced round trip featuring heritage capitals, hill-country landscapes, safari parks, and southern coast charm with curated cultural visits and private chauffeur-guide support.',
                'featured_image' => 'tours/sri-lanka-travel-proposal.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/negombo.jpg',
                    'tours/sri-lanka/sigiriya.jpg',
                    'tours/sri-lanka/kandy.jpg',
                    'tours/sri-lanka/nuwara-eliya.jpg',
                    'tours/sri-lanka/ella.jpg',
                    'tours/sri-lanka/yala.jpg',
                    'tours/sri-lanka/udawalawe.jpg',
                    'tours/sri-lanka/galle.jpg',
                    'tours/sri-lanka/colombo.jpg',
                ],
                'duration_days' => 16,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'As per itinerary (Breakfast daily with selected Dinner and one Lunch inclusion)',
                'max_group_size' => 4,
                'price_per_person' => 1680,
                'difficulty' => 'Easy',
                'included' => [
                    'Meet and greet service at Bandaranaike International Airport by Transco Travel representative',
                    '15 nights accommodation at listed hotels on mentioned meal plan',
                    'Transport in an air-conditioned flat roof van',
                    'Services of a professional Spanish or English-speaking chauffeur guide',
                    'All current hotel taxes and service charges',
                    'All entrances to sights mentioned in itinerary',
                    'Kandy Temple',
                    'Peradeniya Botanical Garden',
                    'Sigiriya Rock',
                    'Dambulla Cave Temple',
                    'Yala National Park jeep safari',
                    'Udawalawe National Park jeep safari',
                    'Udawalawe Transit Home',
                    'Polonnaruwa',
                    'Anuradhapura',
                    'Gregory Lake',
                    'Stilt Fishing',
                    'Pidurangala Rock',
                    'Kandy Market and White Buddha',
                    'Kumbalwela Mahamevnawa Monastery',
                    'Buduruwagala Temple',
                ],
                'excluded' => [
                    'All optional excursions mentioned in itinerary',
                    'Cost of beverages throughout the tour',
                    'Any meal not specified',
                    'Personal expenses',
                    'Any other services not specified above',
                    'Tips and gratuities',
                    'Early check-in and late check-out from hotels',
                ],
                'highlights' => [
                    'Ridi Viharaya Silver Temple',
                    'Sigiriya Rock Fortress',
                    'Polonnaruwa Ancient City',
                    'Pidurangala Rock climb',
                    'Anuradhapura sacred city',
                    'Kandy Temple of the Tooth and cultural highlands',
                    'Tea plantation and factory experience in Nuwara Eliya',
                    'Nine Arches Bridge and Little Adam’s Peak in Ella',
                    'Yala and Udawalawe safari experiences',
                    'Galle Fort and stilt fishermen on southern coast',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Negombo', 'hotel' => 'Earl\'s Regent Negombo', 'room' => 'Deluxe Room'],
                    ['destination' => 'Dambulla', 'hotel' => 'Occidental Paradise Dambulla', 'room' => 'Deluxe Room'],
                    ['destination' => 'Kandy', 'hotel' => 'Golden Crown', 'room' => 'Deluxe Room'],
                    ['destination' => 'Nuwara Eliya', 'hotel' => 'Araliya Red', 'room' => 'Deluxe Room'],
                    ['destination' => 'Ella', 'hotel' => 'Tip Top Ella', 'room' => 'Deluxe Room'],
                    ['destination' => 'Yala', 'hotel' => 'Jetwing Yala', 'room' => 'Deluxe Room'],
                    ['destination' => 'Udawalawe', 'hotel' => 'Grand Udawalawe', 'room' => 'Deluxe Room'],
                    ['destination' => 'Galle', 'hotel' => 'Yara Galle Fort', 'room' => 'Deluxe Room'],
                    ['destination' => 'Colombo', 'hotel' => 'Morven Colombo', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => 'Spanish-speaking chauffeur guide option',
                        'rates' => [
                            ['group' => 'Per person (Double sharing)', 'price' => 1910],
                            ['group' => 'Total for 4 travelers', 'price' => 7640],
                        ],
                        'currency' => 'USD',
                    ],
                    [
                        'label' => 'English-speaking chauffeur guide option',
                        'rates' => [
                            ['group' => 'Per person (Double sharing)', 'price' => 1680],
                            ['group' => 'Total for 4 travelers', 'price' => 6720],
                        ],
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Sea shells garlands',
                    'Two 500ml water bottles per person per day',
                ],
                'other_conditions' => [
                    'Optional excursions and additional services can be provided at additional cost.',
                    'Visits to wildlife parks are at client risk.',
                    'Safari vehicles (non-air-conditioned) are basic with basic insurance cover.',
                ],
                'general_reminders' => [
                    'Program depends on room availability at time of final confirmation.',
                    'Hotels may accept only confirmed bookings during high demand periods.',
                    'Final itinerary and overnight confirmations are shared after acceptance.',
                    'Quotation may be revised if hotel substitutions affect pricing.',
                ],
                'hotel_rules' => 'Official check-in at hotels is generally between 12:00 and 14:00 (depending on hotel). Official check-out is generally at 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Visitors should wear decent clothing at religious sites; shorts and sleeveless tops are not accepted and shoes should be removed where required.',
                'blackout_notes' => 'No blackout dates were specified in this proposal.',
                'extra_supplements' => [
                    'Spanish-speaking chauffeur guide supplement is reflected in package pricing.',
                ],
                'meta_title' => 'Sri Lanka Travel Proposal | 16-Day Guided Round Journey',
                'meta_description' => '16-day Sri Lanka proposal featuring heritage, tea country, Ella highlands, Yala and Udawalawe safaris, Galle Fort, and Colombo finale.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Welcome to Sri Lanka - Negombo',
                'description' => 'Arrival at Colombo airport, transfer to Negombo, and coastal rest day in fishing-town atmosphere.',
                'meals' => 'Dinner',
                'accommodation' => 'Earl\'s Regent Negombo (or similar)',
            ],
            [
                'day_number' => 2,
                'title' => 'Negombo to Sigiriya via Ridi Viharaya',
                'description' => 'Travel to Sigiriya with Silver Temple (Ridi Viharaya) visit and sunset timing recommendation for Sigiriya Rock Fortress.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Occidental Paradise Dambulla (or similar)',
            ],
            [
                'day_number' => 3,
                'title' => 'Polonnaruwa and Pidurangala Climb',
                'description' => 'Morning UNESCO Polonnaruwa ruins, authentic Priyamali Gedera lunch, and afternoon Pidurangala Rock climb.',
                'meals' => 'Breakfast, Lunch & Dinner',
                'accommodation' => 'Occidental Paradise Dambulla (or similar)',
            ],
            [
                'day_number' => 4,
                'title' => 'Anuradhapura Cultural Day',
                'description' => 'Explore Anuradhapura sacred city including Jetavanaramaya, Ruwanwelisaya, and Sri Maha Bodhi.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Occidental Paradise Dambulla (or similar)',
            ],
            [
                'day_number' => 5,
                'title' => 'Sigiriya to Kandy via Dambulla and Matale',
                'description' => 'Proceed to Kandy with visits to Dambulla Cave Temple, Matale spice garden, and Temple of the Tooth.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Golden Crown (or similar)',
            ],
            [
                'day_number' => 6,
                'title' => 'Kandy City and Gardens',
                'description' => 'Peradeniya Botanical Garden, Kandy market, White Buddha viewpoint, and cultural city exploration.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Golden Crown (or similar)',
            ],
            [
                'day_number' => 7,
                'title' => 'Kandy to Nuwara Eliya',
                'description' => 'Hill-country transfer with tea plantation and factory visit, Gregory Lake, and Lover\'s Leap waterfall stop.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Araliya Red (or similar)',
            ],
            [
                'day_number' => 8,
                'title' => 'Nuwara Eliya to Ella',
                'description' => 'Travel to Ella with Nine Arches Bridge and Little Adam\'s Peak experience opportunities.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Tip Top Ella (or similar)',
            ],
            [
                'day_number' => 9,
                'title' => 'Ella - Diyaluma Falls Excursion',
                'description' => 'Day excursion to Diyaluma Falls and visit to Kumbalwela Mahamevnawa Monastery.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Tip Top Ella (or similar)',
            ],
            [
                'day_number' => 10,
                'title' => 'Ella to Yala via Buduruwagala',
                'description' => 'Transfer to Yala region with en-route Ravana Falls and Buduruwagala Temple visit, then safari-focused stay.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Jetwing Yala (or similar)',
            ],
            [
                'day_number' => 11,
                'title' => 'Yala Safari and Kataragama',
                'description' => 'Yala National Park jeep safari with opportunities for leopard and elephant sightings plus Kataragama sacred city visit.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Jetwing Yala (or similar)',
            ],
            [
                'day_number' => 12,
                'title' => 'Yala to Udawalawe',
                'description' => 'Transfer to Udawalawe with Elephant Transit Home visit and safari across elephant-rich plains.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Grand Udawalawe (or similar)',
            ],
            [
                'day_number' => 13,
                'title' => 'Udawalawe to Galle',
                'description' => 'Drive to southern coast with Coconut Tree Hill and stilt fishermen viewing en route before Galle arrival.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yara Galle Fort (or similar)',
            ],
            [
                'day_number' => 14,
                'title' => 'Galle Fort Exploration',
                'description' => 'Leisure and heritage day in UNESCO Galle Fort with colonial streets, galleries, and boutiques.',
                'meals' => 'Breakfast & Dinner',
                'accommodation' => 'Yara Galle Fort (or similar)',
            ],
            [
                'day_number' => 15,
                'title' => 'Galle to Colombo',
                'description' => 'Transfer to Colombo for final city stay and independent exploration with local transport options.',
                'meals' => 'Breakfast',
                'accommodation' => 'Morven Colombo (or similar)',
            ],
            [
                'day_number' => 16,
                'title' => 'Departure',
                'description' => 'Transfer from Colombo hotel to airport according to flight details for departure.',
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
