<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laporan')->insert([[
            'kode_permohonan' => 'APK00121001',
            'nama_pemohon' => 'Royya',
            'no_tlp' => '1234',
            'unit' => '001',
            'ruangan' => 'Persidangan',
            'subjek' => 'APK',
            'deskripsi' => 'TNDE mati',
            'status' => '1',
            'keterangan_pending' => '',
            'keterangan_close' => '',
            'teknisi' => '',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_permohonan' => 'NEW00221001',
            'nama_pemohon' => 'Ahmad',
            'no_tlp' => '4567',
            'unit' => '002',
            'ruangan' => 'Bansos',
            'subjek' => 'NEW',
            'deskripsi' => 'pindah meja',
            'status' => '2',
            'keterangan_pending' => 'Nunggu Alat',
            'keterangan_close' => '',
            'teknisi' => 'T002',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_permohonan' => 'INT00321001',
            'nama_pemohon' => 'Gunadi',
            'no_tlp' => '7890',
            'unit' => '003',
            'ruangan' => 'Fraksi',
            'subjek' => 'INT',
            'deskripsi' => 'Kabel Internet Putus',
            'status' => '3',
            'keterangan_pending' => '',
            'keterangan_close' => 'Krimping Ulang',
            'teknisi' => 'T004',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],[
            'kode_permohonan' => 'INT00121001',
            'nama_pemohon' => 'Noor',
            'no_tlp' => '2345',
            'unit' => '001',
            'ruangan' => 'Risalah',
            'subjek' => 'INT',
            'deskripsi' => 'Minta Kabel LAN',
            'status' => '3',
            'keterangan_pending' => 'Nunggu Kabel ',
            'keterangan_close' => 'Sudah dibuatkan',
            'teknisi' => 'T003',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]]);
    }
}
