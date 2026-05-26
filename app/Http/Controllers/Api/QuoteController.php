<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\QuoteRequestReceived;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'nullable|string|max:30',
            'service_type'     => 'required|in:charter,transfer,tour,pricing',
            'transfer_trip_type' => 'nullable|in:round-trip,one-way',
            'use_vehicle_at_destination' => 'nullable|boolean',
            'pickup_location'  => 'nullable|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
            'pickup_time'      => 'nullable|string|max:8',
            'departure_date'   => 'nullable|date',
            'departure_time'   => 'nullable|string|max:8',
            'transfer_option'  => 'nullable|string|max:255',
            'pickup_lat'       => 'nullable|numeric|between:-90,90',
            'pickup_lng'       => 'nullable|numeric|between:-180,180',
            'dropoff_lat'      => 'nullable|numeric|between:-90,90',
            'dropoff_lng'      => 'nullable|numeric|between:-180,180',
            'distance_km'      => 'nullable|numeric|min:0|max:10000',
            'duration_minutes' => 'nullable|integer|min:0|max:100000',
            'trip_date'        => 'nullable|date',
            'passengers'       => 'nullable|integer|min:1',
            'message'          => 'nullable|string|max:2000',
            'budget'           => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $quote = QuoteRequest::create($validator->validated());

        // Email admin
        Mail::to(env('ADMIN_EMAIL', config('mail.from.address')))
            ->send(new QuoteRequestReceived($quote));

        // Auto-reply to customer
        Mail::to($quote->email)
            ->send(new QuoteRequestReceived($quote, true));

        return response()->json(['message' => 'Quote request submitted successfully.', 'id' => $quote->id], 201);
    }
}
