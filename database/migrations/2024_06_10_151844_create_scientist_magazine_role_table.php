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
        Schema::create('scientist_magazine_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scientist_id');
            $table->unsignedBigInteger('magazine_id');
            $table->unsignedBigInteger('role_id');

            

            $table->foreign('scientist_id')->references('id')->on('scientists')->onDelete('cascade');
            $table->foreign('magazine_id')->references('id')->on('magazines')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scientist_magazine_role');
    }
};
