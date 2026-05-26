<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_type',
        'transfer_trip_type',
        'use_vehicle_at_destination',
        'pickup_location',
        'dropoff_location',
        'pickup_time',
        'departure_date',
        'departure_time',
        'transfer_option',
        'pickup_lat',
        'pickup_lng',
        'dropoff_lat',
        'dropoff_lng',
        'distance_km',
        'duration_minutes',
        'trip_date',
        'passengers',
        'message',
        'budget',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'trip_date' => 'date',
        'departure_date' => 'date',
        'use_vehicle_at_destination' => 'boolean',
        'pickup_lat' => 'float',
        'pickup_lng' => 'float',
        'dropoff_lat' => 'float',
        'dropoff_lng' => 'float',
        'distance_km' => 'float',
        'duration_minutes' => 'integer',
    ];

    public function getQuoteReferenceAttribute(): string
    {
        return 'Q-' . str_pad((string) $this->id, 5, '0', STR_PAD_LEFT);
    }

    public function getQuoteSummaryAttribute(): string
    {
        $parts = [
            ucfirst($this->service_type),
            $this->pickup_location && $this->dropoff_location
                ? $this->pickup_location . ' → ' . $this->dropoff_location
                : $this->pickup_location,
        ];

        return implode(' | ', array_filter($parts));
    }
}
