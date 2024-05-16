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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic_name');
            $table->string('teacher_name');
            $table->enum('result', ['Khá', 'Giỏi', 'Xuất sắc']);
            $table->date('end_date');
            $table->unsignedBigInteger('lvtopic_id');

            $table->foreign('lvtopic_id')->references('id')->on('lvtopics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
