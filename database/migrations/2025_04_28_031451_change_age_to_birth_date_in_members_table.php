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
        Schema::table('members', function (Blueprint $table) {
            $table->date('birth_date')->after('name');  // Menambah kolom birth_date
            $table->dropColumn('age');  // Menghapus kolom age
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->integer('age')->after('name');  // Menambah kolom age kembali
            $table->dropColumn('birth_date');  // Menghapus kolom birth_date
        });
    }
};
