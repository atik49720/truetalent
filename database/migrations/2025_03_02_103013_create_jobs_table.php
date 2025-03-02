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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('category');
            $table->string('location');
            $table->string('salary');
            $table->string('currency');
            $table->string('type');
            $table->string('shift');
            $table->integer('working_exp_year');
            $table->integer('working_hours');
            $table->integer('vacancies');
            $table->date('deadline');

            $table->string('qualification');
            $table->string('skills');
            $table->string('responsibilities');
            $table->string('benefits');

            $table->string('status')->default('pending');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
};
