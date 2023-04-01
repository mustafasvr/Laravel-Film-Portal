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
        Schema::create('ms_film_categories', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->id('category_id')->autoIncrement();
            $table->string('category_name')->nullable();
            $table->string('category_url')->nullable();
            $table->string('category_desc')->nullable();
            $table->string('category_icon')->nullable();
            $table->timestamps();


 

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_film_categories');
    }
};
