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
        Schema::create('ms_settings_group', function (Blueprint $table) {
            $table->increments('group_id');
            $table->string('group_name')->unique();
            $table->string('group_url')->unique();
            $table->string('group_icon');
            $table->string('group_desc')->nullable();
            $table->integer('group_order')->default('0');
            $table->boolean('group_delete')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_settings_group');
    }
};
