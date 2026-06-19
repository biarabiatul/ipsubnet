<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KuisSeeder extends Seeder
{

    public function run()
    {
        DB::table('kuis')->delete();

        DB::table('kuis')->insert([
            [
                'id' => 1,
                'judul' => 'Kuis Bab 1 Sistem Bilangan',
                'bab' => 'Sistem Bilangan',
                'durasi' => 15,
                'jumlah_soal' => 10
            ],

            [
                'id' => 2,
                'judul' => 'Kuis Bab 2 IP Addressing',
                'bab' => 'IP Addressing',
                'durasi' => 15,
                'jumlah_soal' => 10
            ],
            [
                'id' => 3,
                'judul' => 'Kuis Bab 3 Subnetting',
                'bab' => 'Subnetting',
                'durasi' => 15,
                'jumlah_soal' => 10
            ],
             [
                'id' => 4,
                'judul' => 'Evaluasi Akhir',
                'bab' => 'Evaluasi',
                'durasi' => 40,
                'jumlah_soal' => 20
            ]
        ]);
    }
}
