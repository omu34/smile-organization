<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('navigation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('navigation_menu_id')->constrained('navigation_menus')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->nullable(); // route slug or anchor
            $table->string('url')->nullable();   // absolute/relative URL if provided
            $table->foreignId('parent_id')->nullable()->constrained('navigation_items')->nullOnDelete();
            $table->string('label')->nullable()->after('name');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('target')->nullable()->comment('_self or _blank');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('navigation_items');
    }
};
