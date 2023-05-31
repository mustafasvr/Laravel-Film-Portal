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
        Schema::create('ms_film_visitors', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip_address');
            $table->integer('film_id');
            $table->binary('user_agent')->nullable();
            $table->timestamps();
            $table->foreign('film_id')->references('film_id')->on('ms_film')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_film_visitors');
    }
};
