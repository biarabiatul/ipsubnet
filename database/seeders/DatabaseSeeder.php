<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DosenSeeder::class,
            KelasSeeder::class,
            KelasDosenSeeder::class,
            MahasiswaSeeder::class,
            KuisHasilSeeder::class,
            KuisSeeder::class,
            KuisSoalSeeder::class,
            ProgresSeeder::class,
            BankSoalSeeder::class,
        ]);
    }
}
