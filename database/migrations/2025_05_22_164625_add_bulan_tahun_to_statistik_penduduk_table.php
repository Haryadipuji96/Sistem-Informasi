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
        Schema::table('statistik_penduduk', function (Blueprint $table) {
            $table->string('bulan_tahun')->nullable();
        });
    }
    public function down()
    {
        Schema::table('statistik_penduduk', function (Blueprint $table) {
            $table->dropColumn('bulan_tahun');
        });
    }
};
