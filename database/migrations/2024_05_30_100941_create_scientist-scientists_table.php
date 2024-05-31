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
        Schema::create('scientists', function (Blueprint $table) {
            $table->id();
            $table->string('profile_id');
            $table->string('profile_name');
            $table->date('birthday');
            $table->enum('gender',['Nam', 'Nữ']);
            $table->string('birth_place');
            $table->string('address')->nullable();
            $table->integer('office_phone')->nullable();
            $table->integer('house_phone')->nullable();
            $table->integer('telephone');
            $table->string('email');
          
            $table->unsignedBigInteger('degree_id');
            $table->string('investiture')->nullable();
            $table->string('scientific_title')->nullable();
            $table->string('research_major')->nullable();
            $table->string('research_title')->nullable();
            $table->string('research_position')->nullable();
            $table->unsignedBigInteger('office_id');
            $table->string('address_office');
           


            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scientists');
    }
};
