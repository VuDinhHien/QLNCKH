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
        Schema::create('scouncils', function (Blueprint $table) {
            $table->id();
            $table->integer('decision_number');
            $table->date('date');
            $table->unsignedBigInteger('lvcouncil_id');
            $table->unsignedBigInteger('tpcouncil_id');
            $table->string('scouncil_name');
            $table->integer('year');
            
            $table->foreign('lvcouncil_id')->references('id')->on('lvcouncils');
            $table->foreign('tpcouncil_id')->references('id')->on('tpcouncils');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scouncils');
    }
};
