<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgresSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('riwayat_progres')->insert([
            [
                'id_users' => 3,
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Bilangan Biner',
                'status' => 'selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_users' => 3,
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Bilangan Desimal',
                'status' => 'selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // hasil_progres
        DB::table('hasil_progres')->insert([
            [
                'id_users' => 3,
                'persen' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}