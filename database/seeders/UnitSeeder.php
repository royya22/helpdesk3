<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit')->insert([[
            'kode_unit' => '001',
            'nama_unit' => 'PERSIDANGAN, RISALAH, DAN MUSYAWARAH PIMPINAN',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_unit' => '002',
            'nama_unit' => 'SEKRETARIAT BADAN SOSIALISASI',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_unit' => '003',
            'nama_unit' => 'SEKRETARIAT BADAN PENGANGGARAN, FRAKSI DAN KELOMPOK DPD',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]]);
    }
}
