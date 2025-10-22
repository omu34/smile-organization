<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('footer_ctas', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('url');
            $table->string('style_class')->nullable(); // e.g. bg-pink-600 hover:bg-pink-800
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_ctas');
    }
};
