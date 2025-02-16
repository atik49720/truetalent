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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('calling_code');
            $table->integer('phone_number');
            $table->string('email');
            $table->string('website');
            $table->string('description');
            $table->string('logo');
            $table->string('category');
            $table->string('industry');
            $table->string('size');
            $table->integer('founded');

            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->integer('zip');
            $table->string('trade_license');
            $table->string('verification_status')->default('pending');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
