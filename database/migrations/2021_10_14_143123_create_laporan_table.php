<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->string('kode_permohonan',100)->unique();
            $table->string('nama_pemohon',100);
            $table->string('no_tlp',15);
            $table->string('unit',100);
            $table->string('ruangan',100);
            $table->string('subjek',100);
            $table->text('deskripsi');
            $table->string('status',100);
            $table->string('keterangan_pending',100)->default("");
            $table->string('keterangan_close',100)->default("");
            $table->string('teknisi',100)->default('');
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
        Schema::dropIfExists('laporan');
    }
}
