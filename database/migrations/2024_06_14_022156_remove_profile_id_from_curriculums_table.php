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
        Schema::table('curriculums', function (Blueprint $table) {
            //
            // Bỏ khóa ngoại trước khi xóa cột
            $table->dropForeign(['profile_id']);
            // Xóa cột role_id
            $table->dropColumn('profile_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curriculums', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('profile_id');
            // Thêm lại khóa ngoại
            $table->foreign('profile_id')->references('id')->on('scientists');
        });
    }
};
