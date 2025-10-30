<?php

// database/migrations/xxxx_xx_xx_create_galleries_table.php
// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration {
//     public function up(): void
//     {
//         Schema::create('galleries', function (Blueprint $table) {
//             $table->id();
//             $table->string('title');
//             $table->string('category')->nullable();
//             $table->string('image'); // stores relative path in storage
//             $table->text('description')->nullable();
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('galleries');
//     }
// };


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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
