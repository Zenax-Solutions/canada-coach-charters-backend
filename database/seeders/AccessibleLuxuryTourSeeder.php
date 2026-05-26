<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class AccessibleLuxuryTourSeeder extends Seeder
{
    /**
     * Seed Sri Lanka Accessible Luxury Tour (7 Nights / 8 Days).
     */
    public function run(): void
    {
        $category = TourCategory::query()->updateOrCreate(
            ['slug' => 'accessible-luxury-tours'],
            [
                'name' => 'Accessible Luxury Tours',
                'description' => 'Premium wheelchair-friendly and accessibility-focused Sri Lanka tours with comfortable pacing and curated experiences.',
            ]
        );

        $tour = Tour::query()->updateOrCreate(
            ['slug' => '8-day-sri-lanka-accessible-luxury-tour'],
            [
                'tour_category_id' => $category->id,
                'title' => 'Sri Lanka Accessible Luxury Tour (7 Nights / 8 Days)',
                'short_description' => 'Physically challenged friendly itinerary across Colombo, Kalutara, Galle, and Negombo with 5-star accessible stays.',
                'description' => 'An 8-day accessible Sri Lanka journey designed for comfort and ease, combining city highlights, coastal leisure, and gentle excursions with accessible transport and premium accommodation.',
                'featured_image' => 'tours/sri-lanka-accessible-luxury.jpg',
                'gallery_images' => [
                    'tours/sri-lanka/colombo.jpg',
                    'tours/sri-lanka/kalutara.jpg',
                    'tours/sri-lanka/galle.jpg',
                    'tours/sri-lanka/negombo.jpg',
                ],
                'duration_days' => 8,
                'start_location' => 'Bandaranaike International Airport, Sri Lanka',
                'end_location' => 'Bandaranaike International Airport, Sri Lanka',
                'country' => 'Sri Lanka',
                'meal_plan' => 'Breakfast at hotel daily; lunch and dinner at client cost (except day 1 as noted)',
                'max_group_size' => 45,
                'price_per_person' => 530,
                'difficulty' => 'Easy',
                'included' => [
                    'Meet and greet service at Bandaranaike International Airport by Transco Travel representative',
                    '07 nights accommodation at listed hotels on mentioned meal plan',
                    'Transport in an air-conditioned vehicle',
                    '02 Pax: Sedan',
                    '03-04 Pax: Flat Roof Van',
                    '05-06 Pax: High Roof Van',
                    '07-11 Pax: Mini Coach',
                    '12-25 Pax: 33-Seater Coach',
                    '26-38 Pax: 45-Seater Coach',
                    '39-45 Pax: 51-Seater Coach',
                    'Services of a professional English-speaking chauffeur guide/guide',
                    'All current hotel taxes and service charges',
                    'All entrances to sights mentioned in itinerary',
                    'Turtle Hatchery',
                    'Madu River boat ride',
                    'Colombo National Museum',
                    'Gangaramaya Temple',
                ],
                'excluded' => [
                    'All optional excursions if mentioned on the itinerary',
                    'Cost of beverages throughout the tour',
                    'Any meal not specified',
                    'Expenses of a personal nature',
                    'Any services not specified above',
                    'Tips and gratuities',
                    'Early check-in and late check-out from hotels',
                ],
                'highlights' => [
                    'Accessible arrival and transfer support',
                    'Gentle Colombo city touring with wheelchair-friendly stops',
                    'Leisure-focused Kalutara coastal stay',
                    'Madu River scenic boat ride and turtle conservation visit',
                    'Relaxed Galle Fort exploration with accessible pathways',
                    'Final Negombo beachfront unwind near airport',
                ],
                'accommodation_chart' => [
                    ['destination' => 'Colombo', 'hotel' => 'Cinnamon Grand Colombo', 'room' => 'Superior Room'],
                    ['destination' => 'Kalutara', 'hotel' => 'Avani Kalutara', 'room' => 'Deluxe Room'],
                    ['destination' => 'Galle', 'hotel' => 'Radisson Blu', 'room' => 'Deluxe Ocean View Room'],
                    ['destination' => 'Negombo', 'hotel' => 'Jetwing Blue', 'room' => 'Deluxe Room'],
                ],
                'pricing_periods' => [
                    [
                        'label' => '01 May 2026 - 31 Oct 2026',
                        'rates' => [
                            ['group' => '02 Pax (Double)', 'price' => 808],
                            ['group' => '03-04 Pax (Double)', 'price' => 723],
                            ['group' => '05-06 Pax (Double)', 'price' => 635],
                            ['group' => '07-11 Pax (Double)', 'price' => 626],
                            ['group' => '12-25 Pax (Double)', 'price' => 587],
                            ['group' => '26-38 Pax (Double)', 'price' => 546],
                            ['group' => '39-45 Pax (Double)', 'price' => 530],
                        ],
                        'single_supplement' => 333,
                        'triple_reduction' => 51,
                        'currency' => 'USD',
                    ],
                ],
                'complements' => [
                    'Sea shells garlands',
                    'Two 500ml water bottles per day per person',
                ],
                'other_conditions' => [
                    'Optional excursions and additional services can be provided at additional cost.',
                    'Visits to wildlife parks are at client risk.',
                    'Safari vehicles (non-air-conditioned) are basic with basic insurance cover.',
                    'Estimated lunch cost per person per day: USD 15-20.',
                    'Estimated dinner cost per person per day: USD 20-25.',
                ],
                'general_reminders' => [
                    'Program is based on hotel room availability at quotation time.',
                    'Hotels may accept only confirmed bookings during high demand periods.',
                    'Final confirmation is shared with relevant overnight stays and itinerary.',
                    'Price fluctuations due to hotel substitutions may require revised quotation.',
                ],
                'hotel_rules' => 'Official check-in at hotels is generally between 12:00 and 14:00 (depending on hotel). Official check-out is generally at 11:00.',
                'alcohol_policy' => 'Alcohol may not be served in public hotel and restaurant areas during religious holidays.',
                'attire_policy' => 'Visitors should wear decent clothing at religious places. Shorts and sleeveless tops are not accepted, and hats and footwear should be removed where required.',
                'blackout_notes' => 'No blackout period specified for this package; rates are valid from 01 May 2026 to 31 Oct 2026.',
                'extra_supplements' => [
                    'Single room supplement: USD 333.',
                    'Triple room reduction: USD 51.',
                ],
                'meta_title' => 'Sri Lanka Accessible Luxury Tour | 7 Nights / 8 Days',
                'meta_description' => 'Accessible and wheelchair-friendly 8-day Sri Lanka itinerary with luxury stays in Colombo, Kalutara, Galle, and Negombo.',
                'is_featured' => false,
                'status' => 'published',
            ]
        );

        $itinerary = [
            [
                'day_number' => 1,
                'title' => 'Arrival in Colombo',
                'description' => 'Arrival support, private accessible transfer to Colombo, hotel check-in, and optional gentle evening by Galle Face Green.',
                'meals' => 'Lunch & Dinner at client cost',
                'accommodation' => 'Cinnamon Grand Colombo',
            ],
            [
                'day_number' => 2,
                'title' => 'Colombo Training & City Tour',
                'description' => 'Accessible Colombo city tour including Independence Square and Gangaramaya Temple, with optional One Galle Face Mall visit.',
                'meals' => 'Breakfast / Lunch & Dinner at client cost',
                'accommodation' => 'Cinnamon Grand Colombo',
            ],
            [
                'day_number' => 3,
                'title' => 'Colombo Leisure & Orientation',
                'description' => 'Gentle day with relaxation or light sightseeing and a guided city orientation at comfortable pace.',
                'meals' => 'Breakfast / Lunch & Dinner at client cost',
                'accommodation' => 'Cinnamon Grand Colombo',
            ],
            [
                'day_number' => 4,
                'title' => 'Colombo to Kalutara',
                'description' => 'Coastal transfer to Kalutara and leisure time by pool or accessible beach areas.',
                'meals' => 'Breakfast / Lunch & Dinner at client cost',
                'accommodation' => 'Avani Kalutara Resort',
            ],
            [
                'day_number' => 5,
                'title' => 'Kalutara Leisure & River Experience',
                'description' => 'Gentle Madu River boat ride and Kosgoda Turtle Hatchery visit, then return for resort relaxation and optional spa.',
                'meals' => 'Breakfast / Lunch & Dinner at client cost',
                'accommodation' => 'Avani Kalutara Resort',
            ],
            [
                'day_number' => 6,
                'title' => 'Kalutara to Galle',
                'description' => 'Travel along southern coast to Galle and explore the historic fort area at relaxed pace.',
                'meals' => 'Breakfast / Lunch & Dinner at client cost',
                'accommodation' => 'Radisson Blu',
            ],
            [
                'day_number' => 7,
                'title' => 'Galle to Negombo',
                'description' => 'Transfer north to Negombo for final leisure by beach or pool and optional spa/wellness downtime.',
                'meals' => 'Breakfast / Lunch & Dinner at client cost',
                'accommodation' => 'Jetwing Blue',
            ],
            [
                'day_number' => 8,
                'title' => 'Departure',
                'description' => 'Accessible transfer to airport and assisted departure formalities for smooth journey completion.',
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
