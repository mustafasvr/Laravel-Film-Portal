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
        Schema::create('ms_film_vote', function (Blueprint $table) {
            $table->id('vote_id')->autoIncrement();
            $table->integer('film_id')->require();
            $table->integer('user_id');
            $table->integer('vote_score');
            $table->boolean('vote_status')->default(true);
            $table->timestamps();
            $table->foreign('film_id')->references('film_id')->on('ms_film')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_film_vote');
    }
};
