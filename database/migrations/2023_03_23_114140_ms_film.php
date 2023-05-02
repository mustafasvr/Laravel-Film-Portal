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
        Schema::create('ms_film', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->integer('film_id')->unique();
            $table->string('film_url');
            $table->string('title');
            $table->binary('content');
            $table->string('categories');
            $table->string('vote');
            $table->string('popularity');
            $table->string('release_date')->nullable();
            $table->enum('adult', ['true','false']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_film');
    }
};
