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
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->year('tahun'); // Tahun anggaran
            $table->enum('jenis', ['Pendapatan', 'Belanja']); // Tipe data
            $table->string('kategori'); // Sumber/jenis kategori (misalnya Dana Desa, Infrastruktur)
            $table->bigInteger('jumlah'); // Nominal dana
            $table->string('keterangan')->nullable(); // Keterangan opsional
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};
