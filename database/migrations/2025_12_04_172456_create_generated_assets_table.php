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
       Schema::create('generated_assets', function (Blueprint $table) {
    $table->id();

    $table->nullableMorphs('owner');   // 👈 owner_id + owner_type

    $table->string('type');            // text, image, image-edit
    $table->text('prompt')->nullable();
    $table->longText('result_text')->nullable();

    $table->string('image_url')->nullable();
    $table->string('image_path')->nullable();
    $table->string('input_path')->nullable();

    $table->string('status')->default('pending');
    $table->text('error')->nullable();

    $table->json('meta')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_assets');
    }
};
