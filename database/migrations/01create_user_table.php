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
           $table->bigIncrements('id_user');
            $table->string('name');
            $table->string('surname');
            $table->string('middlename');
            $table->string('nickname')->unique();
            $table->string('gender');
            $table->string('country');
            $table->string('email');
            $table->string('password');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        
    }
};
