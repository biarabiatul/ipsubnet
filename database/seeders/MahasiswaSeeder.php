<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = Kelas::where('nama_kelas', 'A2')->first();

        $mahasiswa = [
            ['nama' => 'Ahmad Fauzi', 'nim' => '231001001'],
            ['nama' => 'Siti Rahma', 'nim' => '231001002'],
            ['nama' => 'Muhammad Rizki', 'nim' => '231001003'],
            ['nama' => 'Nur Aisyah', 'nim' => '231001004'],
            ['nama' => 'Rizky Pratama', 'nim' => '231001005'],
            ['nama' => 'Dewi Lestari', 'nim' => '231001006'],
            ['nama' => 'M. Fadillah', 'nim' => '231001007'],
            ['nama' => 'Nadia Putri', 'nim' => '231001008'],
            ['nama' => 'Aulia Rahman', 'nim' => '231001009'],
            ['nama' => 'Fitri Handayani', 'nim' => '231001010'],
            ['nama' => 'Andi Saputra', 'nim' => '231001011'],
            ['nama' => 'Rina Marlina', 'nim' => '231001012'],
            ['nama' => 'Fajar Nugroho', 'nim' => '231001013'],
            ['nama' => 'Nabila Zahra', 'nim' => '231001014'],
            ['nama' => 'Ilham Maulana', 'nim' => '231001015'],
            ['nama' => 'Putri Amelia', 'nim' => '231001016'],
            ['nama' => 'Yusuf Hidayat', 'nim' => '231001017'],
            ['nama' => 'Aisyah Safitri', 'nim' => '231001018'],
            ['nama' => 'Rafi Akbar', 'nim' => '231001019'],
            ['nama' => 'Anisa Khairunnisa', 'nim' => '231001020'],
        ];

        foreach ($mahasiswa as $mhs) {
            User::updateOrCreate(
                ['nim' => $mhs['nim']],
                [
                    'nama_lengkap' => $mhs['nama'],
                    'email' => $mhs['nim'] . '@gmail.com',
                    'password' => bcrypt('password'),
                    'role' => 'mahasiswa',
                    'kelas_id' => $kelas->id,
                ]
            );
        }
    }
}