<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //AdminUserSeeder::class,
            ClassicHighlightsTourSeeder::class,
            WildlifeHeritageTourSeeder::class,
            CulturalAyurvedaJourneySeeder::class,
            GrandIslandJourneySeeder::class,
            AccessibleLuxuryTourSeeder::class,
            GrandAdventureEscapeSeeder::class,
            GrandRoundJourneySeeder::class,
            CulinaryTourSeeder::class,
            TravelProposalSeeder::class,
        ]);
    }
}
