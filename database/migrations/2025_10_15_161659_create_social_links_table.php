<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform_name'); // Matches seeder
            $table->string('icon')->nullable(); // Heroicon or SVG path
            $table->string('url');
            $table->string('color')->default('#000000');
            $table->integer('order')->default(0); // Added missing column
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
