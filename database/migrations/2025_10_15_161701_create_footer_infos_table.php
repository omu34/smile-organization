<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('footer_infos', function (Blueprint $table) {
            $table->id();
            $table->string('office_location')->nullable();
            $table->string('office_url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('copyright_text')->default('© 2024 Smile™. All Rights Reserved.');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_infos');
    }
};
