<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApbdesReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apbdes_reports', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // Pendapatan / Belanja / Pembiayaan
            $table->string('uraian');
            $table->bigInteger('jumlah');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apbdes_reports');
    }
}
