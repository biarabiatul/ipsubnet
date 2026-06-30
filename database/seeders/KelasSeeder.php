<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $dosen = User::where('email', 'rabiatul@gmail.com')->first();

        Kelas::create([
            'nama_kelas' => 'A2',
            'token' => Str::upper(Str::random(6)),
            'created_by' => $dosen->id,
            'kkm_kuis' => 70,
            'kkm_evaluasi' => 70,
        ]);
    }
}