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
        Schema::create('featured_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('media_type')->default('image'); // image|video|youtube
            $table->string('media_url')->nullable();        // local or YouTube URL
            $table->string('thumbnail_url')->nullable();    // auto-generated or uploaded thumbnail
            $table->boolean('is_featured')->default(true);
            $table->integer('position')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_articles');
    }
};
