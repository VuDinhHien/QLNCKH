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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->integer('name');
            $table->integer('year');
            $table->string('publisher');
            $table->unsignedBigInteger('profile_id'); 
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('training_id');
           
            
            $table->foreign('profile_id')->references('id')->on('scientists'); 
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('training_id')->references('id')->on('trainings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculums');
    }
};
