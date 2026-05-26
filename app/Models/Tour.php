<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'tour_category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'featured_image',
        'gallery_images',
        'duration_days',
        'start_location',
        'end_location',
        'country',
        'meal_plan',
        'max_group_size',
        'price_per_person',
        'difficulty',
        'included',
        'excluded',
        'highlights',
        'accommodation_chart',
        'pricing_periods',
        'complements',
        'other_conditions',
        'general_reminders',
        'hotel_rules',
        'alcohol_policy',
        'attire_policy',
        'blackout_notes',
        'extra_supplements',
        'meta_title',
        'meta_description',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'included'       => 'array',
        'excluded'       => 'array',
        'highlights'     => 'array',
        'accommodation_chart' => 'array',
        'pricing_periods' => 'array',
        'complements' => 'array',
        'other_conditions' => 'array',
        'general_reminders' => 'array',
        'extra_supplements' => 'array',
        'is_featured'    => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(TourCategory::class, 'tour_category_id');
    }

    public function itineraries()
    {
        return $this->hasMany(TourItinerary::class)->orderBy('day_number');
    }
}
