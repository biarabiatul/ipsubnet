<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_lengkap' => 'Dr. Rabiatul Adawiyah, M.Kom.',
            'email' => 'rabiatul@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
            'nip' => '198501012010011001',
        ]);
    }
}