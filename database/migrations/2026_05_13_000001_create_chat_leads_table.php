<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); // one record per email address
            $table->string('source')->default('ai_chat'); // where the lead came from
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_leads');
    }
};
