<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->string('file_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }
};
