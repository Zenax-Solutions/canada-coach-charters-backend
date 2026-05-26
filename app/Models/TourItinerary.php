<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourItinerary extends Model
{
    protected $fillable = [
        'tour_id',
        'day_number',
        'title',
        'description',
        'accommodation',
        'meals',
        'activities',
    ];

    protected $casts = [
        'activities' => 'array',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
