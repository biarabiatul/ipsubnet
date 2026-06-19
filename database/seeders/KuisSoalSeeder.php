<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KuisSoalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kuis_soal')->truncate();

        $mapping = [
            1 => 'Kuis Bab 1',
            2 => 'Kuis Bab 2',
            3 => 'Kuis Bab 3',
            4 => 'Evaluasi Akhir'
        ];

        foreach ($mapping as $kuisId => $subbab) {

            $soal = DB::table('bank_soal')
                ->where('subbab', $subbab)
                ->pluck('id_soal');

            $insertData = [];

            foreach ($soal as $id) {
                $insertData[] = [
                    'kuis_id' => $kuisId,
                    'soal_id' => $id
                ];
            }

            DB::table('kuis_soal')->insert($insertData);
        }
    }
}