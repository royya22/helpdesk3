<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsidenTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insiden', function (Blueprint $table) {
            $table->increments('id_insiden');
            $table->string('kode_insiden',100)->unique();
            $table->date('tgl');
            $table->time('jam',);
            $table->string('penyampaian',100);
            $table->string('lokasi',100);
            $table->string('kategori',100);
            $table->text('deskripsi');
            $table->string('pengerjaan',100);
            $table->text('analisis');
            $table->text('solusi');
            $table->string('eskalasi',100);
            $table->string('status',100);
            $table->string('teknisi',100);
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
        Schema::dropIfExists('insiden');
    }
}
