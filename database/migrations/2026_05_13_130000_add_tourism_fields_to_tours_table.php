<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('country')->nullable()->after('end_location');
            $table->string('meal_plan')->nullable()->after('country');
            $table->json('accommodation_chart')->nullable()->after('highlights');
            $table->json('pricing_periods')->nullable()->after('accommodation_chart');
            $table->json('complements')->nullable()->after('pricing_periods');
            $table->json('other_conditions')->nullable()->after('complements');
            $table->json('general_reminders')->nullable()->after('other_conditions');
            $table->text('hotel_rules')->nullable()->after('general_reminders');
            $table->text('alcohol_policy')->nullable()->after('hotel_rules');
            $table->text('attire_policy')->nullable()->after('alcohol_policy');
            $table->text('blackout_notes')->nullable()->after('attire_policy');
            $table->json('extra_supplements')->nullable()->after('blackout_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'meal_plan',
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
            ]);
        });
    }
};
