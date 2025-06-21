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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->integer('calling_code');
            $table->integer('mobile')->unique();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->integer('zip');
            $table->string('present_country');
            $table->string('present_state');
            $table->string('present_city');
            $table->string('present_street');
            $table->integer('present_zip');
            $table->string('gender');
            $table->string('nationality');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('blood_group');
            $table->string('title');
            $table->string('description');
            $table->string('profile_image')->nullable();
            $table->string('resume')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
