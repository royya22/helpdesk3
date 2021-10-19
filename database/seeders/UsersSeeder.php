<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'kode_teknisi' => 'T001',
            'nama_teknisi' => 'Catur',
            'user_teknisi' => 'ctr',
            'password_teknisi' => Hash::make('ctr'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],
        [
            'kode_teknisi' => 'T002',
            'nama_teknisi' => 'Firly',
            'user_teknisi' => 'frl',
            'password_teknisi' => Hash::make('frl'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],
        [
            'kode_teknisi' => 'T003',
            'nama_teknisi' => 'Rizal',
            'user_teknisi' => 'rzl',
            'password_teknisi' => Hash::make('rzl'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],
        [
            'kode_teknisi' => 'T004',
            'nama_teknisi' => 'Royya',
            'user_teknisi' => 'roy',
            'password_teknisi' => Hash::make('roy'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],
        [
            'kode_teknisi' => 'T005',
            'nama_teknisi' => 'Rizky',
            'user_teknisi' => 'rzy',
            'password_teknisi' => Hash::make('rzy'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],
        [
            'kode_teknisi' => 'T006',
            'nama_teknisi' => 'Toyib',
            'user_teknisi' => 'tyb',
            'password_teknisi' => Hash::make('tyb'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ],
        [
            'kode_teknisi' => 'T007',
            'nama_teknisi' => 'Jaka',
            'user_teknisi' => 'jak',
            'password_teknisi' => Hash::make('jak'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]]
    );
    }
}
