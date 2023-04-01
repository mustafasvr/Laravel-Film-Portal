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
        Schema::create('ms_film_images', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->integer('film_id')->unique();
            $table->binary('posters')->nullable();
            $table->binary('backdrops')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_film_images');
    }
};
