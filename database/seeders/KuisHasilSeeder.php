<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KuisHasilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kuis_hasil')->insert([
            [
                'id_pengguna' => 3,
                'id_kuis' => 1,
                'nilai_akhir' => 80,
                'total_benar' => 8,
                'total_salah' => 2,
                'waktu_mengerjakan' => 900,
                'start_time' => now(),
                'end_time' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}