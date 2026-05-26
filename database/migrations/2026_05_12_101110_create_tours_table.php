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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('description');
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->unsignedInteger('duration_days');
            $table->string('start_location')->default('Colombo, Sri Lanka');
            $table->string('end_location')->default('Colombo, Sri Lanka');
            $table->unsignedInteger('max_group_size')->default(20);
            $table->decimal('price_per_person', 10, 2);
            $table->string('difficulty')->default('Easy');
            $table->json('included')->nullable();
            $table->json('excluded')->nullable();
            $table->json('highlights')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
