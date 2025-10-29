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
        Schema::create('navigation_logo_headers', function (Blueprint $table) {
            $table->id();
            $table->string('logo'); // Stores the path to the logo image
            $table->string('link')->nullable()->default('/'); // Stores the URL the logo points to
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_logo_headers');
    }
};
