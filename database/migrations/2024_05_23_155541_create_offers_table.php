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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('proposer');
            $table->integer('year');
            $table->string('offer_name');
            $table->unsignedBigInteger('propose_id');
            $table->unsignedBigInteger('suggestion_id');
            $table->string('note')->nullable();

            $table->foreign('propose_id')->references('id')->on('proposes');
            $table->foreign('suggestion_id')->references('id')->on('suggestions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
