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
            if (!Schema::hasColumn('quote_requests', 'transfer_trip_type')) {
                $table->enum('transfer_trip_type', ['round-trip', 'one-way'])
                    ->nullable()
                    ->after('service_type');
            }

            if (!Schema::hasColumn('quote_requests', 'use_vehicle_at_destination')) {
                $table->boolean('use_vehicle_at_destination')
                    ->nullable()
                    ->after('transfer_trip_type');
            }

            if (!Schema::hasColumn('quote_requests', 'pickup_time')) {
                $table->string('pickup_time', 8)
                    ->nullable()
                    ->after('trip_date');
            }

            if (!Schema::hasColumn('quote_requests', 'departure_date')) {
                $table->date('departure_date')
                    ->nullable()
                    ->after('pickup_time');
            }

            if (!Schema::hasColumn('quote_requests', 'departure_time')) {
                $table->string('departure_time', 8)
                    ->nullable()
                    ->after('departure_date');
            }

            if (!Schema::hasColumn('quote_requests', 'transfer_option')) {
                $table->string('transfer_option')
                    ->nullable()
                    ->after('departure_time');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $columnsToDrop = [];

            foreach (
                [
                    'transfer_trip_type',
                    'use_vehicle_at_destination',
                    'pickup_time',
                    'departure_date',
                    'departure_time',
                    'transfer_option',
                ] as $column
            ) {
                if (Schema::hasColumn('quote_requests', $column)) {
                    $columnsToDrop[] = $column;
                }
            }

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
