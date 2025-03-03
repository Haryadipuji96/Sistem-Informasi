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
        Schema::create('datapegawai', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // Jabatan
            $table->text('address');    // Alamat
            $table->string('gender');   // Jenis Kelamin
            $table->string('pendidikan');  // Tanggal Bergabung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapegawai');
    }
};
