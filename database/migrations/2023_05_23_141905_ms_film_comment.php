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
        Schema::create('ms_film_comment', function (Blueprint $table) {
            $table->id('comment_id')->autoIncrement();
            $table->integer('film_id')->require();
            $table->integer('user_id');
            $table->binary('comment_desc')->nullable();
            $table->boolean('comment_type')->default(true);
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
       
    }
};
