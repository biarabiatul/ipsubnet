<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kelas;

class KelasDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = User::where('role', 'dosen')->first();
        $kelas = Kelas::where('nama_kelas', 'A2')->first();

        if ($dosen && $kelas) {
            DB::table('kelas_dosen')->updateOrInsert(
                [
                    'kelas_id' => $kelas->id,
                    'dosen_id' => $dosen->id,
                ],
                []
            );
        }
    }
}