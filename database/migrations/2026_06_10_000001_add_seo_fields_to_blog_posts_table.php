<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->text('alt_text')->nullable()->after('featured_image');
            $table->string('image_title')->nullable()->after('alt_text');
            $table->longText('schema')->nullable()->after('meta_description');
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn(['alt_text', 'image_title', 'schema']);
        });
    }
};
