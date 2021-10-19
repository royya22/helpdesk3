<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LaporanSeeder::class,
            SubjekSeeder::class,
            TeknisiSeeder::class,
            UnitSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
