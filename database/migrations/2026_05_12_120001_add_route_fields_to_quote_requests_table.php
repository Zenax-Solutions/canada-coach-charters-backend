<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->decimal('pickup_lat', 10, 7)->nullable()->after('dropoff_location');
            $table->decimal('pickup_lng', 10, 7)->nullable()->after('pickup_lat');
            $table->decimal('dropoff_lat', 10, 7)->nullable()->after('pickup_lng');
            $table->decimal('dropoff_lng', 10, 7)->nullable()->after('dropoff_lat');
            $table->decimal('distance_km', 8, 2)->nullable()->after('dropoff_lng');
            $table->unsignedInteger('duration_minutes')->nullable()->after('distance_km');
            $table->enum('transfer_trip_type', ['round-trip', 'one-way'])->nullable()->after('service_type');
            $table->boolean('use_vehicle_at_destination')->nullable()->after('transfer_trip_type');
            $table->string('pickup_time', 8)->nullable()->after('trip_date');
            $table->date('departure_date')->nullable()->after('pickup_time');
            $table->string('departure_time', 8)->nullable()->after('departure_date');
            $table->string('transfer_option')->nullable()->after('departure_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->dropColumn([
                'pickup_lat',
                'pickup_lng',
                'dropoff_lat',
                'dropoff_lng',
                'distance_km',
                'duration_minutes',
                'transfer_trip_type',
                'use_vehicle_at_destination',
                'pickup_time',
                'departure_date',
                'departure_time',
                'transfer_option',
            ]);
        });
    }
};
