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
        Schema::create('users', function (Blueprint $table) {
            
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->integer('user_id')->autoIncrement();
            $table->string('username', 32)->unique();
            $table->string('email')->unique();
            $table->binary('password');
            $table->binary('picture')->nullable();
            $table->enum('permission', ['user', 'admin', 'banned'])->default('user');
            $table->binary('token')->nullable();
            $table->binary('remember_token')->nullable();
            $table->integer('register_date');
            $table->integer('last_activity');
            $table->ipAddress('ip_address');
            $table->enum('user_state', ['email_onay', 'aktif', 'pasif'])->default('email_onay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_user');
    }
};
