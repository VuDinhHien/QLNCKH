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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->string('conference_name');
            $table->unsignedBigInteger('seminar_id');
            $table->string('office')->nullable();
            $table->string('unit')->nullable();
            $table->string('money')->nullable();
            $table->string('status_name')->nullable();
            $table->date('date');
           

            $table->foreign('seminar_id')->references('id')->on('seminars');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
