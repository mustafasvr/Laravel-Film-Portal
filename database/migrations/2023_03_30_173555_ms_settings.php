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

        Schema::create('ms_settings', function (Blueprint $table) {
            $table->id('settings_id')->autoIncrement();
            $table->integer('group_id')->unsigned();
            $table->string('settings_name')->unique()->require();
            $table->string('settings_value')->nullable();
            $table->enum('settings_type', ['text','color','file','textarea'])->default('text');
            $table->boolean('settings_delete')->default(true);
            $table->foreign('group_id')->references('group_id')->on('ms_settings_group')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_settings');
    }
};
