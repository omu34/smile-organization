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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('founder_quote')->nullable();
            $table->string('founder_name')->nullable();
            $table->string('highlight_text')->nullable();
            $table->string('highlight_link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('video_path')->nullable(); // path to mp4
            $table->string('video_url')->nullable();
            $table->string('background_opacity')->default('0.7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
