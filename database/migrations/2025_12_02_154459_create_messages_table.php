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
         Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained()->cascadeOnDelete();
            $table->enum('role', ['user','assistant','system'])->default('user');
            $table->text('content')->nullable(); // markdown / text
            $table->json('meta')->nullable(); // For DALL-E URLs, email headers, tokens
            $table->integer('tokens')->default(0);
            $table->boolean('is_partial')->default(false); // partial streaming pieces
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
