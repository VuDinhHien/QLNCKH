<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('file_type');
            $table->unsignedBigInteger('related_id');
            $table->string('related_type');
            $table->timestamps();

            $table->index(['related_id', 'related_type']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('files');
    }
};
