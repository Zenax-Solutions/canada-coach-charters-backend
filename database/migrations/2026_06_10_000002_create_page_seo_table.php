<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_seo', function (Blueprint $table) {
            $table->id();
            $table->string('page')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamps();
        });

        DB::table('page_seo')->insert([
            ['page' => 'home', 'meta_title' => 'Canada Coach Charters | Rental Bus Services in Toronto', 'meta_description' => 'Explore Canada with Canada Coach Charters. We provide wedding, corporate, private travel, school rentals, and airport shuttle services at affordable rates.', 'keywords' => 'bus rental Toronto, coach charter, Canada Coach Charters'],
            ['page' => 'about', 'meta_title' => 'About Us | Canada Coach Charters', 'meta_description' => 'Learn about Canada Coach Charters, your trusted partner for group transportation across Toronto and the GTA.', 'keywords' => 'about Canada Coach Charters, bus company Toronto'],
            ['page' => 'services', 'meta_title' => 'Our Services | Canada Coach Charters', 'meta_description' => 'Explore our charter coach, airport transfer, wedding, corporate, and school transportation services.', 'keywords' => 'charter services Toronto, bus rental services'],
            ['page' => 'fleet', 'meta_title' => 'Our Fleet | Canada Coach Charters', 'meta_description' => 'Browse our modern fleet of charter buses, mini coaches, and executive vehicles.', 'keywords' => 'bus fleet Toronto, charter buses'],
            ['page' => 'transfers', 'meta_title' => 'Airport Transfers | Canada Coach Charters', 'meta_description' => 'Reliable airport transfer services across Toronto Pearson and beyond.', 'keywords' => 'airport transfer Toronto, shuttle service'],
            ['page' => 'tours', 'meta_title' => 'Tours | Canada Coach Charters', 'meta_description' => 'Discover guided tour packages and custom travel itineraries across Canada.', 'keywords' => 'bus tours Canada, guided tours'],
            ['page' => 'contact', 'meta_title' => 'Contact Us | Canada Coach Charters', 'meta_description' => 'Get in touch with Canada Coach Charters for quotes, bookings, and inquiries.', 'keywords' => 'contact bus company Toronto, quote'],
            ['page' => 'blog', 'meta_title' => 'Blog | Canada Coach Charters', 'meta_description' => 'Transportation guides, planning tips, and fleet insights for group travel.', 'keywords' => 'bus blog, transportation tips'],
            ['page' => 'faq', 'meta_title' => 'FAQ | Canada Coach Charters', 'meta_description' => 'Frequently asked questions about our charter bus and transportation services.', 'keywords' => 'bus rental FAQ, charter questions'],
            ['page' => 'gallery', 'meta_title' => 'Gallery | Canada Coach Charters', 'meta_description' => 'View our fleet and past service gallery.', 'keywords' => 'bus gallery, coach photos'],
            ['page' => 'privacy-policy', 'meta_title' => 'Privacy Policy | Canada Coach Charters', 'meta_description' => 'Our privacy policy and data handling practices.', 'keywords' => 'privacy policy, data privacy'],
            ['page' => 'terms-and-conditions', 'meta_title' => 'Terms and Conditions | Canada Coach Charters', 'meta_description' => 'Terms and conditions for our transportation services.', 'keywords' => 'terms and conditions, bus rental terms'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('page_seo');
    }
};
