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
        Schema::table('topics', function (Blueprint $table) {
            //
             // Bỏ khóa ngoại trước khi xóa cột
             $table->dropForeign(['role_id']);
             // Xóa cột role_id
             $table->dropColumn('role_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            //
            // Thêm lại cột role_id
            $table->unsignedBigInteger('role_id');
            // Thêm lại khóa ngoại
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }
};
