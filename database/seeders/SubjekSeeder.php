<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjek')->insert([[
            'kode_subjek' => 'INT',
            'subjek' => 'Koneksi Internet / LAN',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_subjek' => 'NEW',
            'subjek' => 'Instalasi Baru',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_subjek' => 'APK',
            'subjek' => 'Aplikasi Penunjang Kinerja',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_subjek' => 'EML',
            'subjek' => 'Email',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_subjek' => 'PRN',
            'subjek' => 'Printer',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_subjek' => 'VRS',
            'subjek' => 'Virus / Antivirus',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_subjek' => 'LLN',
            'subjek' => 'Lain Lain',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]]);
    }
}
