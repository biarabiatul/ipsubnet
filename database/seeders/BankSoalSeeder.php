<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSoalSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('bank_soal')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->seedBinerKeDesimal();
        $this->seedDesimalKeBiner();
        $this->seedKuisBab1();
        $this->seedKelasIp();
        $this->seedNetworkHost();
        $this->seedPublikPrivat();
        $this->seedSubnetMask();
        $this->seedCIDR();
        $this->seedKuisBab2();
        $this->seedSubnetting();
        $this->seedVLSM();
        $this->seedKuisBab3();
        $this->seedEvaluasi();
    }

    private function seedBinerKeDesimal()
    {
        DB::table('bank_soal')->insert([

            // MUDAH
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00000001', 'jawaban_benar' => '1'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00000010', 'jawaban_benar' => '2'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00000011', 'jawaban_benar' => '3'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00000100', 'jawaban_benar' => '4'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00000101', 'jawaban_benar' => '5'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00000111', 'jawaban_benar' => '7'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00001001', 'jawaban_benar' => '9'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00001010', 'jawaban_benar' => '10'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00001100', 'jawaban_benar' => '12'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00001111', 'jawaban_benar' => '15'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00010010', 'jawaban_benar' => '18'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00010100', 'jawaban_benar' => '20'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00011001', 'jawaban_benar' => '25'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00011110', 'jawaban_benar' => '30'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00100001', 'jawaban_benar' => '33'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00100011', 'jawaban_benar' => '35'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00100100', 'jawaban_benar' => '36'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00101010', 'jawaban_benar' => '42'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00101101', 'jawaban_benar' => '45'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'mudah', 'soal' => '00110001', 'jawaban_benar' => '49'],

            // SEDANG
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '00111011', 'jawaban_benar' => '59'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01000001', 'jawaban_benar' => '65'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01000110', 'jawaban_benar' => '70'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01001001', 'jawaban_benar' => '73'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01001100', 'jawaban_benar' => '76'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01010101', 'jawaban_benar' => '85'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01100100', 'jawaban_benar' => '100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01100110', 'jawaban_benar' => '102'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01101001', 'jawaban_benar' => '105'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01110010', 'jawaban_benar' => '114'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01110111', 'jawaban_benar' => '119'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '01111000', 'jawaban_benar' => '120'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10000001', 'jawaban_benar' => '129'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10001000', 'jawaban_benar' => '136'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10010001', 'jawaban_benar' => '145'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10010100', 'jawaban_benar' => '148'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10011010', 'jawaban_benar' => '154'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10100100', 'jawaban_benar' => '164'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10101100', 'jawaban_benar' => '172'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sedang', 'soal' => '10110011', 'jawaban_benar' => '179'],

            // SULIT
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '10111000', 'jawaban_benar' => '184'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11000101', 'jawaban_benar' => '197'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11001010', 'jawaban_benar' => '202'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11010010', 'jawaban_benar' => '210'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11011001', 'jawaban_benar' => '217'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11100001', 'jawaban_benar' => '225'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11100100', 'jawaban_benar' => '228'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11101010', 'jawaban_benar' => '234'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11101111', 'jawaban_benar' => '239'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11110000', 'jawaban_benar' => '240'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11110010', 'jawaban_benar' => '242'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11110100', 'jawaban_benar' => '244'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11110110', 'jawaban_benar' => '246'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111000', 'jawaban_benar' => '248'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111001', 'jawaban_benar' => '249'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111010', 'jawaban_benar' => '250'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111100', 'jawaban_benar' => '252'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111101', 'jawaban_benar' => '253'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111110', 'jawaban_benar' => '254'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Biner', 'tipe_soal' => 'biner_ke_desimal', 'tingkat' => 'sulit', 'soal' => '11111111', 'jawaban_benar' => '255'],

        ]);
    }

    private function seedDesimalKeBiner()
    {
        DB::table('bank_soal')->insert([

            // MUDAH
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '1', 'jawaban_benar' => '00000001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '2', 'jawaban_benar' => '00000010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '5', 'jawaban_benar' => '00000101'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '7', 'jawaban_benar' => '00000111'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '8', 'jawaban_benar' => '00001000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '10', 'jawaban_benar' => '00001010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '13', 'jawaban_benar' => '00001101'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '15', 'jawaban_benar' => '00001111'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '18', 'jawaban_benar' => '00010010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '21', 'jawaban_benar' => '00010101'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '25', 'jawaban_benar' => '00011001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '30', 'jawaban_benar' => '00011110'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '33', 'jawaban_benar' => '00100001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '34', 'jawaban_benar' => '00100010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '36', 'jawaban_benar' => '00100100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '42', 'jawaban_benar' => '00101010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '49', 'jawaban_benar' => '00110001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '50', 'jawaban_benar' => '00110010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '64', 'jawaban_benar' => '01000000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'mudah', 'soal' => '73', 'jawaban_benar' => '01001001'],

            // SEDANG
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '85', 'jawaban_benar' => '01010101'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '96', 'jawaban_benar' => '01100000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '100', 'jawaban_benar' => '01100100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '105', 'jawaban_benar' => '01101001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '107', 'jawaban_benar' => '01101011'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '114', 'jawaban_benar' => '01110010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '119', 'jawaban_benar' => '01110111'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '120', 'jawaban_benar' => '01111000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '123', 'jawaban_benar' => '01111011'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '129', 'jawaban_benar' => '10000001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '136', 'jawaban_benar' => '10001000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '138', 'jawaban_benar' => '10001010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '145', 'jawaban_benar' => '10010001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '148', 'jawaban_benar' => '10010100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '154', 'jawaban_benar' => '10011010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '164', 'jawaban_benar' => '10100100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '172', 'jawaban_benar' => '10101100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '179', 'jawaban_benar' => '10110011'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '184', 'jawaban_benar' => '10111000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sedang', 'soal' => '197', 'jawaban_benar' => '11000101'],

            // SULIT
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '200', 'jawaban_benar' => '11001000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '202', 'jawaban_benar' => '11001010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '210', 'jawaban_benar' => '11010010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '217', 'jawaban_benar' => '11011001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '224', 'jawaban_benar' => '11100000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '228', 'jawaban_benar' => '11100100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '238', 'jawaban_benar' => '11101110'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '240', 'jawaban_benar' => '11110000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '250', 'jawaban_benar' => '11111010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '255', 'jawaban_benar' => '11111111'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '201', 'jawaban_benar' => '11001001'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '206', 'jawaban_benar' => '11001110'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '211', 'jawaban_benar' => '11010011'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '219', 'jawaban_benar' => '11011011'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '230', 'jawaban_benar' => '11100110'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '232', 'jawaban_benar' => '11101000'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '236', 'jawaban_benar' => '11101100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '242', 'jawaban_benar' => '11110010'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '244', 'jawaban_benar' => '11110100'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Sistem Bilangan Desimal', 'tipe_soal' => 'desimal_ke_biner', 'tingkat' => 'sulit', 'soal' => '248', 'jawaban_benar' => '11111000'],
        ]);
    }

    private function seedKuisBab1()
    {
        DB::table('bank_soal')->insert([

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Sistem bilangan biner merupakan sistem bilangan dengan basis ....',
                'pilgan_opsi' => json_encode([
                    "a" => "2",
                    "b" => "8",
                    "c" => "10",
                    "d" => "16",
                    "e" => "256"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Sistem bilangan desimal menggunakan 10 digit (0–9). Hal ini karena ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Hanya terdiri dari angka 0 dan 1",
                    "b" => "Sistem desimal berbasis 10 sehingga memiliki 10 simbol angka",
                    "c" => "Setiap digit memiliki nilai yang sama",
                    "d" => "Digunakan khusus dalam komputer",
                    "e" => "Tidak memiliki nilai tempat"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam sistem komputer, satuan data terkecil yang hanya memiliki nilai 0 atau 1 disebut ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Byte",
                    "b" => "Oktet",
                    "c" => "Bit",
                    "d" => "Digit",
                    "e" => "Data"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam sistem komputer, 8 bit digabungkan menjadi satu kelompok yang disebut ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Byte",
                    "b" => "Bit",
                    "c" => "Nibble",
                    "d" => "Digit",
                    "e" => "Word"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Jumlah kombinasi nilai yang dapat dibentuk oleh 8 bit adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "8",
                    "b" => "16",
                    "c" => "255",
                    "d" => "256",
                    "e" => "512"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Bilangan biner \(00100000_2\) memiliki nilai desimal ....',
                'pilgan_opsi' => json_encode([
                    "a" => "16",
                    "b" => "24",
                    "c" => "32",
                    "d" => "48",
                    "e" => "64"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Bilangan biner \(00001010_2\) jika dikonversi ke desimal adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "8",
                    "b" => "9",
                    "c" => "12",
                    "d" => "14",
                    "e" => "10"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Bilangan biner \(00101101_2\) jika dikonversi ke desimal adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "43",
                    "b" => "47",
                    "c" => "41",
                    "d" => "39",
                    "e" => "45"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Hasil konversi bilangan desimal \(173_{10}\) ke dalam bentuk biner 8-bit adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "10110101",
                    "b" => "10101101",
                    "c" => "10011101",
                    "d" => "10101011",
                    "e" => "11001101"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Sistem Bilangan',
                'subbab' => 'Kuis Bab 1',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Bilangan desimal \(154_{10}\) jika dikonversi ke dalam bentuk biner 8-bit adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "01000000",
                    "b" => "10011110",
                    "c" => "10101010",
                    "d" => "10011010",
                    "e" => "10111010"
                ]),
                'jawaban_benar' => 'd'
            ]

        ]);
    }

    private function seedKelasIp()
    {
        DB::table('bank_soal')->insert([

            // ================= MUDAH =================
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '10.250.1.1', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '150.10.15.0', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '192.14.2.0', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '193.42.1.1', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '126.8.156.0', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '220.200.23.1', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '117.89.56.45', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '215.45.45.0', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '8.1.1.1', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '130.10.5.4', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '172.16.5.10', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '192.168.10.5', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '223.10.10.10', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '199.155.77.56', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '14.200.10.1', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '64.10.5.2', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '131.107.1.1', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '145.25.10.10', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '202.100.50.25', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'mudah', 'soal' => '218.1.1.1', 'jawaban_benar' => 'C'],

            // ================= SEDANG =================
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '224.1.1.1', 'jawaban_benar' => 'D'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '239.1.1.1', 'jawaban_benar' => 'D'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '225.10.10.10', 'jawaban_benar' => 'D'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '240.10.10.10', 'jawaban_benar' => 'E'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '245.1.1.1', 'jawaban_benar' => 'E'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '249.240.80.78', 'jawaban_benar' => 'E'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '223.255.255.254', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '200.10.10.10', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '192.0.2.1', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '191.255.10.10', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '158.200.1.1', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '190.10.10.10', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '131.107.1.1', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '60.200.10.5', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '117.89.56.45', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '172.16.5.10', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '215.45.45.0', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '223.45.10.1', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '225.1.1.1', 'jawaban_benar' => 'D'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sedang', 'soal' => '241.1.1.1', 'jawaban_benar' => 'E'],

            // ================= SULIT =================
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10010100.00010001.00001001.00000001', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11100110.11100110.00101101.00111010', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10110001.01100100.00010010.00000100', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '01110111.00010010.00101101.00000000', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '00001010.00000001.00000001.00000001', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '01111111.00000000.00000000.00000001', 'jawaban_benar' => 'A'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10000010.00001010.00000001.00000001', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10101100.00010001.00000001.00000010', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11000000.10101000.00000001.00000001', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11011111.00001010.00001010.00001010', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11100000.00000001.00000001.00000001', 'jawaban_benar' => 'D'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11110000.00001010.00001010.00001010', 'jawaban_benar' => 'E'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10010110.00000001.00000001.00000001', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11001010.00001010.00000001.00000001', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11100001.00000001.00000001.00000001', 'jawaban_benar' => 'D'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11110100.00000001.00000001.00000001', 'jawaban_benar' => 'E'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10001010.00000001.00000001.00000001', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '10101111.00000001.00000001.00000001', 'jawaban_benar' => 'B'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11010010.00000001.00000001.00000001', 'jawaban_benar' => 'C'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address', 'tipe_soal' => 'kelas_ip', 'tingkat' => 'sulit', 'soal' => '11101010.00000001.00000001.00000001', 'jawaban_benar' => 'D'],

        ]);
    }

    private function seedNetworkHost()
    {
        DB::table('bank_soal')->insert([

            // ================= NETWORK ID =================

            // MUDAH
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '10.20.30.40', 'jawaban_benar' => '10'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '8.100.50.1', 'jawaban_benar' => '8'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '33.1.1.1', 'jawaban_benar' => '33'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '95.200.10.5', 'jawaban_benar' => '95'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '126.45.10.2', 'jawaban_benar' => '126'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '192.168.1.10', 'jawaban_benar' => '192.168.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '200.100.50.25', 'jawaban_benar' => '200.100.50'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '220.15.30.40', 'jawaban_benar' => '220.15.30'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '172.16.5.10', 'jawaban_benar' => '172.16'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'mudah', 'soal' => '192.168.2.1', 'jawaban_benar' => '192.168.2'],

            // SEDANG
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '177.100.18.4', 'jawaban_benar' => '177.100'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '180.25.60.10', 'jawaban_benar' => '180.25'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '140.50.20.1', 'jawaban_benar' => '140.50'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '160.45.10.5', 'jawaban_benar' => '160.45'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '175.50.1.1', 'jawaban_benar' => '175.50'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '190.200.10.1', 'jawaban_benar' => '190.200'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '199.10.20.30', 'jawaban_benar' => '199.10.20'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '100.25.10.1', 'jawaban_benar' => '100'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '111.25.30.40', 'jawaban_benar' => '111'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sedang', 'soal' => '155.10.30.2', 'jawaban_benar' => '155.10'],

            // SULIT
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '00001010.00000001.00000001.00000001', 'jawaban_benar' => '00001010'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '01111111.00000000.00000000.00000001', 'jawaban_benar' => '01111111'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '10000010.00001010.00000001.00000001', 'jawaban_benar' => '10000010.00001010'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '10101100.00010001.00000001.00000010', 'jawaban_benar' => '10101100.00010001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '11011111.00001010.00001010.00001010', 'jawaban_benar' => '11011111.00001010.00001010'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '11100000.00000001.00000001.00000001', 'jawaban_benar' => '11100000.00000001.00000001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '10110001.01100100.00010010.00000100', 'jawaban_benar' => '10110001.01100100'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '11100110.11100110.00101101.00111010', 'jawaban_benar' => '11100110.11100110.00101101'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '10010100.00010001.00001001.00000001', 'jawaban_benar' => '10010100.00010001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'network_id', 'tingkat' => 'sulit', 'soal' => '10111111.00001010.00000001.00000001', 'jawaban_benar' => '10111111.00001010'],

            // ================= HOST ID =================

            // MUDAH
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '10.20.30.40', 'jawaban_benar' => '20.30.40'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '8.100.50.1', 'jawaban_benar' => '100.50.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '33.1.1.1', 'jawaban_benar' => '1.1.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '95.200.10.5', 'jawaban_benar' => '200.10.5'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '126.45.10.2', 'jawaban_benar' => '45.10.2'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '192.168.1.10', 'jawaban_benar' => '10'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '200.100.50.25', 'jawaban_benar' => '25'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '220.15.30.40', 'jawaban_benar' => '40'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '172.16.5.10', 'jawaban_benar' => '5.10'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'mudah', 'soal' => '192.168.2.1', 'jawaban_benar' => '1'],

            // SEDANG
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '177.100.18.4', 'jawaban_benar' => '18.4'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '180.25.60.10', 'jawaban_benar' => '60.10'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '140.50.20.1', 'jawaban_benar' => '20.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '160.45.10.5', 'jawaban_benar' => '10.5'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '175.50.1.1', 'jawaban_benar' => '1.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '190.200.10.1', 'jawaban_benar' => '10.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '199.10.20.30', 'jawaban_benar' => '30'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '100.25.10.1', 'jawaban_benar' => '25.10.1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '111.25.30.40', 'jawaban_benar' => '25.30.40'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sedang', 'soal' => '155.10.30.2', 'jawaban_benar' => '30.2'],

            // SULIT
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '00001010.00000001.00000001.00000001', 'jawaban_benar' => '00000001.00000001.00000001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '01111111.00000000.00000000.00000001', 'jawaban_benar' => '00000000.00000000.00000001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '10000010.00001010.00000001.00000001', 'jawaban_benar' => '00000001.00000001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '10101100.00010001.00000001.00000010', 'jawaban_benar' => '00000001.00000010'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '11011111.00001010.00001010.00001010', 'jawaban_benar' => '00001010'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '11100000.00000001.00000001.00000001', 'jawaban_benar' => '00000001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '10110001.01100100.00010010.00000100', 'jawaban_benar' => '00010010.00000100'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '11100110.11100110.00101101.00111010', 'jawaban_benar' => '00111010'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '10010100.00010001.00001001.00000001', 'jawaban_benar' => '00001001.00000001'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network & Host ID', 'tipe_soal' => 'host_id', 'tingkat' => 'sulit', 'soal' => '10111111.00001010.00000001.00000001', 'jawaban_benar' => '00000001.00000001'],

        ]);
    }

    private function seedPublikPrivat()
    {
        DB::table('bank_soal')->insert([

            // ================= MUDAH =================
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '192.168.1.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '192.168.10.10', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '192.168.100.5', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '192.168.0.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '192.168.50.50', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '10.0.0.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '10.1.1.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '10.10.10.10', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '10.255.255.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '10.5.5.5', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '172.16.0.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '172.20.1.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '172.25.10.10', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '172.31.255.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '172.18.5.5', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '8.8.8.8', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '1.1.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '9.9.9.9', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '4.2.2.2', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'mudah', 'soal' => '11.0.0.1', 'jawaban_benar' => 'Publik'],

            // ================= SEDANG =================
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '192.167.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '192.200.10.10', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '192.100.5.5', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '192.10.10.10', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '192.0.2.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '172.32.0.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '172.40.10.2', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '172.50.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '172.100.10.10', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '172.200.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '100.10.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '150.150.150.150', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '45.67.89.10', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '20.30.40.50', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '13.14.15.16', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '23.45.67.89', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '99.88.77.66', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '120.130.140.150', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '200.100.50.25', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sedang', 'soal' => '10.100.200.1', 'jawaban_benar' => 'Privat'],

            // ================= SULIT =================
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '10.200.1.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '10.123.45.67', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '10.250.250.250', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '10.99.88.77', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.17.10.10', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.30.1.5', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.16.255.255', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.31.0.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.19.100.100', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '192.168.200.200', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '192.168.0.255', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '192.168.255.1', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '192.168.77.77', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '192.168.10.200', 'jawaban_benar' => 'Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.15.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.33.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '192.169.1.1', 'jawaban_benar' => 'Publik'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '10.256.1.1', 'jawaban_benar' => 'Tidak Valid'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat', 'tipe_soal' => 'publik_privat', 'tingkat' => 'sulit', 'soal' => '172.31.256.1', 'jawaban_benar' => 'Tidak Valid'],

        ]);
    }
    private function seedSubnetMask()
    {
        DB::table('bank_soal')->insert([

            // DEFAULT SUBNET MASK
            // MUDAH 
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '33.1.1.1', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '95.200.10.5', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '8.200.10.5', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '10.10.250.1', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '150.10.20.30', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '145.60.30.2', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '172.16.5.10', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '200.100.50.25', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '220.15.30.40', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'mudah', 'soal' => '201.10.5.100', 'jawaban_benar' => '255.255.255.0'],

            // SEDANG 
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '99.25.10.1', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '100.25.10.1', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '111.25.30.40', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '128.10.20.30', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '140.50.20.1', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '175.50.1.1', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '177.100.18.4', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '180.25.60.10', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '190.200.10.1', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sedang', 'soal' => '222.100.10.5', 'jawaban_benar' => '255.255.255.0'],

            // SULIT 
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '119.18.45.0', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '126.123.23.1', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '191.249.234.191', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '192.12.35.105', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '223.23.223.109', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '00001010.00000001.00000010.00000011', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '10101100.00010000.00000101.00001010', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '11000000.10101000.00000001.00001010', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '10111111.11111001.11101010.10111111', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'subnet_mask', 'tingkat' => 'sulit', 'soal' => '11011111.00010111.11011111.01101101', 'jawaban_benar' => '255.255.255.0'],

            // ANDING DEFAULT
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '188.10.18.2|255.255.0.0', 'jawaban_benar' => '188.10.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '10.10.48.80|255.255.255.0', 'jawaban_benar' => '10.10.48.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '172.16.5.10|255.255.0.0', 'jawaban_benar' => '172.16.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '10.10.10.10|255.0.0.0', 'jawaban_benar' => '10.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '200.100.50.25|255.255.255.0', 'jawaban_benar' => '200.100.50.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '99.25.10.1|255.0.0.0', 'jawaban_benar' => '99.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '128.10.20.30|255.255.0.0', 'jawaban_benar' => '128.10.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '220.15.30.40|255.255.255.0', 'jawaban_benar' => '220.15.30.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '33.1.1.1|255.0.0.0', 'jawaban_benar' => '33.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'mudah', 'soal' => '95.200.10.5|255.0.0.0', 'jawaban_benar' => '95.0.0.0'],

            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '150.203.23.19|255.255.0.0', 'jawaban_benar' => '150.203.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '140.50.20.1|255.255.0.0', 'jawaban_benar' => '140.50.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '190.200.10.1|255.255.0.0', 'jawaban_benar' => '190.200.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '175.50.1.1|255.255.0.0', 'jawaban_benar' => '175.50.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '145.60.30.2|255.255.0.0', 'jawaban_benar' => '145.60.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '201.10.5.100|255.255.255.0', 'jawaban_benar' => '201.10.5.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '111.25.30.40|255.0.0.0', 'jawaban_benar' => '111.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '222.100.10.5|255.255.255.0', 'jawaban_benar' => '222.100.10.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '100.25.10.1|255.0.0.0', 'jawaban_benar' => '100.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sedang', 'soal' => '160.45.10.5|255.255.0.0', 'jawaban_benar' => '160.45.0.0'],

            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '10101100.00010000.00000101.00001010|255.255.0.0', 'jawaban_benar' => '172.16.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '11000000.10101000.00000001.00001010|255.255.255.0', 'jawaban_benar' => '192.168.1.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '00001010.00000001.00000001.00000001|255.0.0.0', 'jawaban_benar' => '10.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '10000010.00001010.00010100.00011110|255.255.0.0', 'jawaban_benar' => '130.10.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '11011111.00001010.00001010.00001010|255.255.255.0', 'jawaban_benar' => '223.10.10.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '10101111.00110010.00000001.00000001|255.255.0.0', 'jawaban_benar' => '175.50.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '11001000.01100100.00110010.00011001|255.255.255.0', 'jawaban_benar' => '200.100.50.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '01100011.00011001.00001010.00000001|255.0.0.0', 'jawaban_benar' => '99.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '10010110.00101101.00010010.00000100|255.255.0.0', 'jawaban_benar' => '150.45.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask', 'tipe_soal' => 'anding_default', 'tingkat' => 'sulit', 'soal' => '11001010.00001010.00000001.00000001|255.255.255.0', 'jawaban_benar' => '202.10.1.0'],
        ]);
    }

    private function seedCIDR()
    {
        DB::table('bank_soal')->insert([

            // MUDAH
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '192.168.1.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.0.0.0/8', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.0.0.0/16', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.16.0.0/16', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.16.0.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.20.0.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.10.10.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '192.168.2.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.1.0.0/8', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.1.0.0/16', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.20.10.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '192.168.5.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.2.0.0/8', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.2.0.0/16', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.31.0.0/16', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.31.1.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '192.168.10.0/24', 'jawaban_benar' => '255.255.255.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.3.0.0/8', 'jawaban_benar' => '255.0.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '10.3.0.0/16', 'jawaban_benar' => '255.255.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'mudah', 'soal' => '172.25.0.0/16', 'jawaban_benar' => '255.255.0.0'],

            // SEDANG
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.1.0/25', 'jawaban_benar' => '255.255.255.128'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.1.0/26', 'jawaban_benar' => '255.255.255.192'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.1.0/27', 'jawaban_benar' => '255.255.255.224'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.1.0/28', 'jawaban_benar' => '255.255.255.240'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.16.0.0/25', 'jawaban_benar' => '255.255.255.128'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.20.0.0/26', 'jawaban_benar' => '255.255.255.192'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.20.0.0/27', 'jawaban_benar' => '255.255.255.224'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.20.0.0/28', 'jawaban_benar' => '255.255.255.240'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '10.10.10.0/25', 'jawaban_benar' => '255.255.255.128'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '10.10.10.0/26', 'jawaban_benar' => '255.255.255.192'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '10.10.10.0/27', 'jawaban_benar' => '255.255.255.224'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.10.0/26', 'jawaban_benar' => '255.255.255.192'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.10.0/27', 'jawaban_benar' => '255.255.255.224'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.10.0/28', 'jawaban_benar' => '255.255.255.240'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.16.0.0/17', 'jawaban_benar' => '255.255.128.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.16.0.0/18', 'jawaban_benar' => '255.255.192.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.16.0.0/19', 'jawaban_benar' => '255.255.224.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '172.16.0.0/20', 'jawaban_benar' => '255.255.240.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '10.0.0.0/17', 'jawaban_benar' => '255.255.128.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sedang', 'soal' => '192.168.10.0/19', 'jawaban_benar' => '255.255.224.0'],

            // SULIT
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.1.0/29', 'jawaban_benar' => '255.255.255.248'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.1.0/30', 'jawaban_benar' => '255.255.255.252'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.1.0/23', 'jawaban_benar' => '255.255.254.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.1.0/22', 'jawaban_benar' => '255.255.252.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.1.0/21', 'jawaban_benar' => '255.255.248.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/9', 'jawaban_benar' => '255.128.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/10', 'jawaban_benar' => '255.192.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/11', 'jawaban_benar' => '255.224.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/12', 'jawaban_benar' => '255.240.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/13', 'jawaban_benar' => '255.248.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/14', 'jawaban_benar' => '255.252.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '10.0.0.0/15', 'jawaban_benar' => '255.254.0.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '172.16.0.0/21', 'jawaban_benar' => '255.255.248.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '172.16.0.0/22', 'jawaban_benar' => '255.255.252.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '172.16.0.0/23', 'jawaban_benar' => '255.255.254.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.10.0/29', 'jawaban_benar' => '255.255.255.248'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.10.0/30', 'jawaban_benar' => '255.255.255.252'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.10.0/18', 'jawaban_benar' => '255.255.192.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.10.0/20', 'jawaban_benar' => '255.255.240.0'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR', 'tipe_soal' => 'cidr', 'tingkat' => 'sulit', 'soal' => '192.168.10.0/21', 'jawaban_benar' => '255.255.248.0'],

        ]);
    }

    private function seedKuisBab2()
    {
        DB::table('bank_soal')->insert([

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'IP Address dalam jaringan komputer digunakan untuk ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Menyimpan data dalam jaringan",
                    "b" => "Mengidentifikasi setiap perangkat dalam jaringan",
                    "c" => "Mengatur kecepatan koneksi internet",
                    "d" => "Menggantikan fungsi subnet mask",
                    "e" => "Digunakan hanya pada jaringan lokal"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Jumlah maksimum alamat IPv4 yang dapat dibentuk adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "2<sup>16</sup>",
                    "b" => "2<sup>8</sup>",
                    "c" => "2<sup>64</sup>",
                    "d" => "2<sup>32</sup>",
                    "e" => "2<sup>128</sup>"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Diberikan alamat <i>IP</i> berikut:
                        <ol>
                            <li>192.168.10.10</li>
                            <li>10.10.10.10</li>
                            <li>172.16.5.256</li>
                        </ol>

                        Alamat <i>IP</i> yang <strong>tidak valid</strong> adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "1 saja",
                    "b" => "2 saja",
                    "c" => "3 saja",
                    "d" => "1 dan 2",
                    "e" => "2 dan 3"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Alamat IP dengan oktet pertama 00001010 termasuk ke dalam kelas ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Kelas A",
                    "b" => "Kelas B",
                    "c" => "Kelas C",
                    "d" => "Kelas D",
                    "e" => "Kelas E"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Diberikan dua alamat <i>IP</i> berikut:
                            <ul>
                                <li>00001010.00000001.00000001.00000001</li>
                                <li>00001010.00000010.00000010.00000010</li>
                            </ul>

                            Kedua alamat <i>IP</i> tersebut termasuk dalam kelas yang sama karena ....
                            ',
                'pilgan_opsi' => json_encode([
                    "a" => "Memiliki jumlah oktet yang sama",
                    "b" => "Memiliki nilai host yang sama",
                    "c" => "Oktet pertama diawali dengan bit 0",
                    "d" => "Menggunakan subnet mask yang sama",
                    "e" => "Memiliki jumlah bit 32"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Alamat IP yang digunakan dalam jaringan lokal dan tidak dapat diakses langsung dari internet adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "IP Publik",
                    "b" => "IP Global",
                    "c" => "IP Loopback",
                    "d" => "IP Broadcast",
                    "e" => "IP Privat"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Pernyataan yang benar tentang subnet mask adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Bit 1 menunjukkan host",
                    "b" => "Bit 0 menunjukkan network",
                    "c" => "Bit 1 dan 0 tidak berpengaruh",
                    "d" => "Bit 1 menunjukkan network dan bit 0 menunjukkan host",
                    "e" => "Semua bit menunjukkan host"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Network address dari IP Address 188.10.18.2 dengan subnet mask 255.255.0.0 adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "188.10.18.2",
                    "b" => "188.0.0.0",
                    "c" => "188.10.18.0",
                    "d" => "188.255.0.0",
                    "e" => "188.10.0.0"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Sebuah jaringan menggunakan prefix /26 pada IPv4. Jumlah bit yang digunakan untuk host adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "2 bit",
                    "b" => "4 bit",
                    "c" => "6 bit",
                    "d" => "26 bit",
                    "e" => "32 bit"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'IP Addressing',
                'subbab' => 'Kuis Bab 2',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Network address dari IP Address 192.168.1.130/26 adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.1.0",
                    "b" => "192.168.1.64",
                    "c" => "192.168.1.128",
                    "d" => "192.168.1.192",
                    "e" => "192.168.1.255"
                ]),
                'jawaban_benar' => 'c'
            ],

        ]);
    }

    private function seedSubnetting()
    {
        DB::table('bank_soal')->insert([

            // MUDAH
            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.1.0', 'subnet' => 4, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 2,
                    'jumlah_subnet' => 4,
                    'host_valid' => 62,
                    'blok_subnet' => 64
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.2.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.3.0', 'subnet' => 16, 'host_kebutuhan' => 14]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.240',
                    'bit_dipinjam' => 4,
                    'jumlah_subnet' => 16,
                    'host_valid' => 14,
                    'blok_subnet' => 16
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.4.0', 'subnet' => 2, 'host_kebutuhan' => 126]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.128',
                    'bit_dipinjam' => 1,
                    'jumlah_subnet' => 2,
                    'host_valid' => 126,
                    'blok_subnet' => 128
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.5.0', 'subnet' => 4, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 2,
                    'jumlah_subnet' => 4,
                    'host_valid' => 62,
                    'blok_subnet' => 64
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.6.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.7.0', 'subnet' => 16, 'host_kebutuhan' => 14]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.240',
                    'bit_dipinjam' => 4,
                    'jumlah_subnet' => 16,
                    'host_valid' => 14,
                    'blok_subnet' => 16
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.8.0', 'subnet' => 2, 'host_kebutuhan' => 126]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.128',
                    'bit_dipinjam' => 1,
                    'jumlah_subnet' => 2,
                    'host_valid' => 126,
                    'blok_subnet' => 128
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.9.0', 'subnet' => 4, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 2,
                    'jumlah_subnet' => 4,
                    'host_valid' => 62,
                    'blok_subnet' => 64
                ]),
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'mudah',
                'soal' => json_encode(['ip' => '192.168.10.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32
                ]),
            ],

            // SEDANG
            // SEDANG
            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.1.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 7,
                        'host' => 5
                    ],

                    'range_target' => '192.168.1.96-192.168.1.127',
                    'network_target' => '192.168.1.224',
                    'broadcast_target' => '192.168.1.223',
                    'host_target' => '192.168.1.129-192.168.1.158'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.10.0', 'subnet' => 16, 'host_kebutuhan' => 14]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.240',
                    'bit_dipinjam' => 4,
                    'jumlah_subnet' => 16,
                    'host_valid' => 14,
                    'blok_subnet' => 16,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.10.48-192.168.10.63',
                    'network_target' => '192.168.10.112',
                    'broadcast_target' => '192.168.10.207',
                    'host_target' => '192.168.10.129-192.168.10.142'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.20.0', 'subnet' => 4, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 2,
                    'jumlah_subnet' => 4,
                    'host_valid' => 62,
                    'blok_subnet' => 64,

                    'target' => [
                        'range' => 4,
                        'network' => 3,
                        'broadcast' => 2,
                        'host' => 1
                    ],

                    'range_target' => '192.168.20.192-192.168.20.255',
                    'network_target' => '192.168.20.128',
                    'broadcast_target' => '192.168.20.127',
                    'host_target' => '192.168.20.1-192.168.20.62'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.30.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 3,
                        'host' => 6
                    ],

                    'range_target' => '192.168.30.96-192.168.30.127',
                    'network_target' => '192.168.30.224',
                    'broadcast_target' => '192.168.30.95',
                    'host_target' => '192.168.30.161-192.168.30.190'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.40.0', 'subnet' => 16, 'host_kebutuhan' => 14]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.240',
                    'bit_dipinjam' => 4,
                    'jumlah_subnet' => 16,
                    'host_valid' => 14,
                    'blok_subnet' => 16,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.40.48-192.168.40.63',
                    'network_target' => '192.168.40.112',
                    'broadcast_target' => '192.168.40.207',
                    'host_target' => '192.168.40.129-192.168.40.142'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.50.0', 'subnet' => 4, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 2,
                    'jumlah_subnet' => 4,
                    'host_valid' => 62,
                    'blok_subnet' => 64,

                    'target' => [
                        'range' => 4,
                        'network' => 2,
                        'broadcast' => 3,
                        'host' => 2
                    ],

                    'range_target' => '192.168.50.192-192.168.50.255',
                    'network_target' => '192.168.50.64',
                    'broadcast_target' => '192.168.50.191',
                    'host_target' => '192.168.50.65-192.168.50.126'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.60.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 6,
                        'broadcast' => 7,
                        'host' => 5
                    ],

                    'range_target' => '192.168.60.96-192.168.60.127',
                    'network_target' => '192.168.60.160',
                    'broadcast_target' => '192.168.60.223',
                    'host_target' => '192.168.60.129-192.168.60.158'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.70.0', 'subnet' => 16, 'host_kebutuhan' => 14]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.240',
                    'bit_dipinjam' => 4,
                    'jumlah_subnet' => 16,
                    'host_valid' => 14,
                    'blok_subnet' => 16,

                    'target' => [
                        'range' => 4,
                        'network' => 10,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.70.48-192.168.70.63',
                    'network_target' => '192.168.70.144',
                    'broadcast_target' => '192.168.70.207',
                    'host_target' => '192.168.70.129-192.168.70.142'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.80.0', 'subnet' => 4, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 2,
                    'jumlah_subnet' => 4,
                    'host_valid' => 62,
                    'blok_subnet' => 64,

                    'target' => [
                        'range' => 4,
                        'network' => 3,
                        'broadcast' => 2,
                        'host' => 3
                    ],

                    'range_target' => '192.168.80.192-192.168.80.255',
                    'network_target' => '192.168.80.128',
                    'broadcast_target' => '192.168.80.127',
                    'host_target' => '192.168.80.129-192.168.80.190'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sedang',
                'soal' => json_encode(['ip' => '192.168.90.0', 'subnet' => 8, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 3,
                    'jumlah_subnet' => 8,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 5,
                        'broadcast' => 7,
                        'host' => 5
                    ],

                    'range_target' => '192.168.90.96-192.168.90.127',
                    'network_target' => '192.168.90.128',
                    'broadcast_target' => '192.168.90.223',
                    'host_target' => '192.168.90.129-192.168.90.158'
                ])
            ],

            // SULIT
            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '192.168.1.0', 'subnet' => 16, 'host_kebutuhan' => 14]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.240',
                    'bit_dipinjam' => 4,
                    'jumlah_subnet' => 16,
                    'host_valid' => 14,
                    'blok_subnet' => 16,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.1.48-192.168.1.63',
                    'network_target' => '192.168.1.112',
                    'broadcast_target' => '192.168.1.207',
                    'host_target' => '192.168.1.129-192.168.1.142'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '192.168.10.0', 'subnet' => 32, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 5,
                    'jumlah_subnet' => 32,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.10.96-192.168.10.127',
                    'network_target' => '192.168.10.224',
                    'broadcast_target' => '192.168.10.159',
                    'host_target' => '192.168.10.129-192.168.10.158'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '172.16.0.0', 'subnet' => 1024, 'host_kebutuhan' => 62]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'B',
                    'subnet_mask_default' => '255.255.0.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 10,
                    'jumlah_subnet' => 64,
                    'host_valid' => 62,
                    'blok_subnet' => 64,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '172.16.0.192-172.16.0.255',
                    'network_target' => '172.16.1.192',
                    'broadcast_target' => '172.16.3.255',
                    'host_target' => '172.16.2.1-172.16.2.62'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '192.168.100.0', 'subnet' => 64, 'host_kebutuhan' => 2]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.252',
                    'bit_dipinjam' => 6,
                    'jumlah_subnet' => 64,
                    'host_valid' => 2,
                    'blok_subnet' => 4,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.100.12-192.168.100.15',
                    'network_target' => '192.168.100.28',
                    'broadcast_target' => '192.168.100.51',
                    'host_target' => '192.168.100.33-192.168.100.34'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '192.168.150.0', 'subnet' => 32, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 5,
                    'jumlah_subnet' => 32,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.150.96-192.168.150.127',
                    'network_target' => '192.168.150.224',
                    'broadcast_target' => '192.168.150.159',
                    'host_target' => '192.168.150.129-192.168.150.158'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '10.10.0.0', 'subnet' => 2048, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'A',
                    'subnet_mask_default' => '255.0.0.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 11,
                    'jumlah_subnet' => 2048,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '10.10.0.96-10.10.0.127',
                    'network_target' => '10.10.0.224',
                    'broadcast_target' => '10.10.1.31',
                    'host_target' => '10.10.0.129-10.10.0.158'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '192.168.0.0', 'subnet' => 32, 'host_kebutuhan' => 30]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.224',
                    'bit_dipinjam' => 5,
                    'jumlah_subnet' => 32,
                    'host_valid' => 30,
                    'blok_subnet' => 32,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.0.96-192.168.0.127',
                    'network_target' => '192.168.0.224',
                    'broadcast_target' => '192.168.0.159',
                    'host_target' => '192.168.0.129-192.168.0.158'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '192.168.1.0', 'subnet' => 64, 'host_kebutuhan' => 2]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'C',
                    'subnet_mask_default' => '255.255.255.0',
                    'subnet_mask_baru' => '255.255.255.252',
                    'bit_dipinjam' => 6,
                    'jumlah_subnet' => 64,
                    'host_valid' => 2,
                    'blok_subnet' => 4,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '192.168.1.12-192.168.1.15',
                    'network_target' => '192.168.1.28',
                    'broadcast_target' => '192.168.1.51',
                    'host_target' => '192.168.1.33-192.168.1.34'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '165.100.0.0', 'subnet' => 64, 'host_kebutuhan' => 1022]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'B',
                    'subnet_mask_default' => '255.255.0.0',
                    'subnet_mask_baru' => '255.255.252.0',
                    'bit_dipinjam' => 6,
                    'jumlah_subnet' => 64,
                    'host_valid' => 1022,
                    'blok_subnet' => 4,

                    'target' => [
                        'range' => 4,
                        'network' => 8,
                        'broadcast' => 13,
                        'host' => 9
                    ],

                    'range_target' => '165.100.12.0-165.100.15.255',
                    'network_target' => '165.100.28.0',
                    'broadcast_target' => '165.100.51.255',
                    'host_target' => '165.100.32.1-165.100.35.254'
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Perhitungan Subnetting',
                'tipe_soal' => 'subnetting',
                'tingkat' => 'sulit',
                'soal' => json_encode(['ip' => '190.35.0.0', 'subnet' => 1024, 'host_kebutuhan' => 60]),
                'jawaban_benar' => json_encode([
                    'kelas_ip' => 'B',
                    'subnet_mask_default' => '255.255.0.0',
                    'subnet_mask_baru' => '255.255.255.192',
                    'bit_dipinjam' => 10,
                    'jumlah_subnet' => 1024,
                    'host_valid' => 62,
                    'blok_subnet' => 64,

                    'target' => [
                        'range' => 15,
                        'network' => 13,
                        'broadcast' => 10,
                        'host' => 6
                    ],

                    'range_target' => '190.35.3.128-190.35.3.191',
                    'network_target' => '190.35.3.0',
                    'broadcast_target' => '190.35.2.127',
                    'host_target' => '190.35.1.65-190.35.1.126'
                ])
            ],
        ]);
    }

    private function seedVLSM()
    {
        // MUDAH
        DB::table('bank_soal')->insert([

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.10.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 50,
                        'Dosen' => 20,
                        'Admin' => 10
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.10.0', 'range' => '192.168.10.1 - 192.168.10.62', 'broadcast' => '192.168.10.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.10.64', 'range' => '192.168.10.65 - 192.168.10.94', 'broadcast' => '192.168.10.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.10.96', 'range' => '192.168.10.97 - 192.168.10.110', 'broadcast' => '192.168.10.111']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.11.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 60,
                        'Dosen' => 25,
                        'Admin' => 10,
                        'Tamu' => 5
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.11.0', 'range' => '192.168.11.1 - 192.168.11.62', 'broadcast' => '192.168.11.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.11.64', 'range' => '192.168.11.65 - 192.168.11.94', 'broadcast' => '192.168.11.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.11.96', 'range' => '192.168.11.97 - 192.168.11.110', 'broadcast' => '192.168.11.111'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.11.112', 'range' => '192.168.11.113 - 192.168.11.118', 'broadcast' => '192.168.11.119']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.12.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 40,
                        'Dosen' => 20,
                        'Admin' => 10
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.12.0', 'range' => '192.168.12.1 - 192.168.12.62', 'broadcast' => '192.168.12.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.12.64', 'range' => '192.168.12.65 - 192.168.12.94', 'broadcast' => '192.168.12.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.12.96', 'range' => '192.168.12.97 - 192.168.12.110', 'broadcast' => '192.168.12.111']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.13.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 50,
                        'Dosen' => 25,
                        'Admin' => 15,
                        'Tamu' => 5
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.13.0', 'range' => '192.168.13.1 - 192.168.13.62', 'broadcast' => '192.168.13.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.13.64', 'range' => '192.168.13.65 - 192.168.13.94', 'broadcast' => '192.168.13.95'],
                    ['nama' => 'Admin', 'prefix' => '/27', 'network' => '192.168.13.96', 'range' => '192.168.13.97 - 192.168.13.126', 'broadcast' => '192.168.13.127'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.13.128', 'range' => '192.168.13.129 - 192.168.13.134', 'broadcast' => '192.168.13.135']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.14.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 60,
                        'Dosen' => 30,
                        'Admin' => 10
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.14.0', 'range' => '192.168.14.1 - 192.168.14.62', 'broadcast' => '192.168.14.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.14.64', 'range' => '192.168.14.65 - 192.168.14.94', 'broadcast' => '192.168.14.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.14.96', 'range' => '192.168.14.97 - 192.168.14.110', 'broadcast' => '192.168.14.111']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.15.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 40,
                        'Dosen' => 25,
                        'Admin' => 10,
                        'Tamu' => 5
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.15.0', 'range' => '192.168.15.1 - 192.168.15.62', 'broadcast' => '192.168.15.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.15.64', 'range' => '192.168.15.65 - 192.168.15.94', 'broadcast' => '192.168.15.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.15.96', 'range' => '192.168.15.97 - 192.168.15.110', 'broadcast' => '192.168.15.111'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.15.112', 'range' => '192.168.15.113 - 192.168.15.118', 'broadcast' => '192.168.15.119']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.16.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 50,
                        'Dosen' => 20,
                        'Admin' => 10
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.16.0', 'range' => '192.168.16.1 - 192.168.16.62', 'broadcast' => '192.168.16.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.16.64', 'range' => '192.168.16.65 - 192.168.16.94', 'broadcast' => '192.168.16.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.16.96', 'range' => '192.168.16.97 - 192.168.16.110', 'broadcast' => '192.168.16.111']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.17.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 60,
                        'Dosen' => 25,
                        'Admin' => 10,
                        'Tamu' => 5
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.17.0', 'range' => '192.168.17.1 - 192.168.17.62', 'broadcast' => '192.168.17.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.17.64', 'range' => '192.168.17.65 - 192.168.17.94', 'broadcast' => '192.168.17.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.17.96', 'range' => '192.168.17.97 - 192.168.17.110', 'broadcast' => '192.168.17.111'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.17.112', 'range' => '192.168.17.113 - 192.168.17.118', 'broadcast' => '192.168.17.119']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.18.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 50,
                        'Dosen' => 30,
                        'Admin' => 10
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.18.0', 'range' => '192.168.18.1 - 192.168.18.62', 'broadcast' => '192.168.18.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.18.64', 'range' => '192.168.18.65 - 192.168.18.94', 'broadcast' => '192.168.18.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.18.96', 'range' => '192.168.18.97 - 192.168.18.110', 'broadcast' => '192.168.18.111']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'mudah',
                'soal' => json_encode([
                    'ip' => '192.168.19.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 40,
                        'Dosen' => 20,
                        'Admin' => 10,
                        'Tamu' => 5
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/26', 'network' => '192.168.19.0', 'range' => '192.168.19.1 - 192.168.19.62', 'broadcast' => '192.168.19.63'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.19.64', 'range' => '192.168.19.65 - 192.168.19.94', 'broadcast' => '192.168.19.95'],
                    ['nama' => 'Admin', 'prefix' => '/28', 'network' => '192.168.19.96', 'range' => '192.168.19.97 - 192.168.19.110', 'broadcast' => '192.168.19.111'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.19.112', 'range' => '192.168.19.113 - 192.168.19.118', 'broadcast' => '192.168.19.119']
                ])
            ],

            // SEDANG
            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.20.0/24',
                    'kebutuhan' => [
                        'LabKomputer' => 70,
                        'RuangDosen' => 30,
                        'Perpustakaan' => 12,
                        'WiFiTamu' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabKomputer', 'prefix' => '/25', 'network' => '192.168.20.0', 'range' => '192.168.20.1 - 192.168.20.126', 'broadcast' => '192.168.20.127'],
                    ['nama' => 'RuangDosen', 'prefix' => '/27', 'network' => '192.168.20.128', 'range' => '192.168.20.129 - 192.168.20.158', 'broadcast' => '192.168.20.159'],
                    ['nama' => 'Perpustakaan', 'prefix' => '/28', 'network' => '192.168.20.160', 'range' => '192.168.20.161 - 192.168.20.174', 'broadcast' => '192.168.20.175'],
                    ['nama' => 'WiFiTamu', 'prefix' => '/29', 'network' => '192.168.20.176', 'range' => '192.168.20.177 - 192.168.20.182', 'broadcast' => '192.168.20.183']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.21.0/24',
                    'kebutuhan' => [
                        'LabJaringan' => 80,
                        'TataUsaha' => 25,
                        'RuangKelas' => 15,
                        'Hotspot' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabJaringan', 'prefix' => '/25', 'network' => '192.168.21.0', 'range' => '192.168.21.1 - 192.168.21.126', 'broadcast' => '192.168.21.127'],
                    ['nama' => 'TataUsaha', 'prefix' => '/27', 'network' => '192.168.21.128', 'range' => '192.168.21.129 - 192.168.21.158', 'broadcast' => '192.168.21.159'],
                    ['nama' => 'RuangKelas', 'prefix' => '/27', 'network' => '192.168.21.160', 'range' => '192.168.21.161 - 192.168.21.190', 'broadcast' => '192.168.21.191'],
                    ['nama' => 'Hotspot', 'prefix' => '/29', 'network' => '192.168.21.192', 'range' => '192.168.21.193 - 192.168.21.198', 'broadcast' => '192.168.21.199']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.22.0/24',
                    'kebutuhan' => [
                        'LabMultimedia' => 60,
                        'Dosen' => 35,
                        'Administrasi' => 12,
                        'AksesTamu' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabMultimedia', 'prefix' => '/26', 'network' => '192.168.22.0', 'range' => '192.168.22.1 - 192.168.22.62', 'broadcast' => '192.168.22.63'],
                    ['nama' => 'Dosen', 'prefix' => '/26', 'network' => '192.168.22.64', 'range' => '192.168.22.65 - 192.168.22.126', 'broadcast' => '192.168.22.127'],
                    ['nama' => 'Administrasi', 'prefix' => '/28', 'network' => '192.168.22.128', 'range' => '192.168.22.129 - 192.168.22.142', 'broadcast' => '192.168.22.143'],
                    ['nama' => 'AksesTamu', 'prefix' => '/29', 'network' => '192.168.22.144', 'range' => '192.168.22.145 - 192.168.22.150', 'broadcast' => '192.168.22.151']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.23.0/24',
                    'kebutuhan' => [
                        'Server' => 70,
                        'Karyawan' => 30,
                        'RuangMeeting' => 10,
                        'Tamu' => 8
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'Server', 'prefix' => '/25', 'network' => '192.168.23.0', 'range' => '192.168.23.1 - 192.168.23.126', 'broadcast' => '192.168.23.127'],
                    ['nama' => 'Karyawan', 'prefix' => '/27', 'network' => '192.168.23.128', 'range' => '192.168.23.129 - 192.168.23.158', 'broadcast' => '192.168.23.159'],
                    ['nama' => 'RuangMeeting', 'prefix' => '/28', 'network' => '192.168.23.160', 'range' => '192.168.23.161 - 192.168.23.174', 'broadcast' => '192.168.23.175'],
                    ['nama' => 'Tamu', 'prefix' => '/28', 'network' => '192.168.23.176', 'range' => '192.168.23.177 - 192.168.23.190', 'broadcast' => '192.168.23.191']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.24.0/24',
                    'kebutuhan' => [
                        'LabAI' => 80,
                        'Dosen' => 40,
                        'Perpustakaan' => 12,
                        'WiFi' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabAI', 'prefix' => '/25', 'network' => '192.168.24.0', 'range' => '192.168.24.1 - 192.168.24.126', 'broadcast' => '192.168.24.127'],
                    ['nama' => 'Dosen', 'prefix' => '/26', 'network' => '192.168.24.128', 'range' => '192.168.24.129 - 192.168.24.190', 'broadcast' => '192.168.24.191'],
                    ['nama' => 'Perpustakaan', 'prefix' => '/28', 'network' => '192.168.24.192', 'range' => '192.168.24.193 - 192.168.24.206', 'broadcast' => '192.168.24.207'],
                    ['nama' => 'WiFi', 'prefix' => '/29', 'network' => '192.168.24.208', 'range' => '192.168.24.209 - 192.168.24.214', 'broadcast' => '192.168.24.215']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.25.0/24',
                    'kebutuhan' => [
                        'LabData' => 60,
                        'Staff' => 30,
                        'Administrasi' => 15,
                        'Tamu' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabData', 'prefix' => '/26', 'network' => '192.168.25.0', 'range' => '192.168.25.1 - 192.168.25.62', 'broadcast' => '192.168.25.63'],
                    ['nama' => 'Staff', 'prefix' => '/27', 'network' => '192.168.25.64', 'range' => '192.168.25.65 - 192.168.25.94', 'broadcast' => '192.168.25.95'],
                    ['nama' => 'Administrasi', 'prefix' => '/27', 'network' => '192.168.25.96', 'range' => '192.168.25.97 - 192.168.25.126', 'broadcast' => '192.168.25.127'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.25.128', 'range' => '192.168.25.129 - 192.168.25.134', 'broadcast' => '192.168.25.135']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.26.0/24',
                    'kebutuhan' => [
                        'LabCloud' => 70,
                        'Karyawan' => 35,
                        'RuangKelas' => 12,
                        'Tamu' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabCloud', 'prefix' => '/25', 'network' => '192.168.26.0', 'range' => '192.168.26.1 - 192.168.26.126', 'broadcast' => '192.168.26.127'],
                    ['nama' => 'Karyawan', 'prefix' => '/26', 'network' => '192.168.26.128', 'range' => '192.168.26.129 - 192.168.26.190', 'broadcast' => '192.168.26.191'],
                    ['nama' => 'RuangKelas', 'prefix' => '/28', 'network' => '192.168.26.192', 'range' => '192.168.26.193 - 192.168.26.206', 'broadcast' => '192.168.26.207'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.26.208', 'range' => '192.168.26.209 - 192.168.26.214', 'broadcast' => '192.168.26.215']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.27.0/24',
                    'kebutuhan' => [
                        'Server' => 80,
                        'Dosen' => 30,
                        'Administrasi' => 10,
                        'Hotspot' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'Server', 'prefix' => '/25', 'network' => '192.168.27.0', 'range' => '192.168.27.1 - 192.168.27.126', 'broadcast' => '192.168.27.127'],
                    ['nama' => 'Dosen', 'prefix' => '/27', 'network' => '192.168.27.128', 'range' => '192.168.27.129 - 192.168.27.158', 'broadcast' => '192.168.27.159'],
                    ['nama' => 'Administrasi', 'prefix' => '/28', 'network' => '192.168.27.160', 'range' => '192.168.27.161 - 192.168.27.174', 'broadcast' => '192.168.27.175'],
                    ['nama' => 'Hotspot', 'prefix' => '/29', 'network' => '192.168.27.176', 'range' => '192.168.27.177 - 192.168.27.182', 'broadcast' => '192.168.27.183']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.28.0/24',
                    'kebutuhan' => [
                        'LabIoT' => 60,
                        'TataUsaha' => 25,
                        'RuangDosen' => 12,
                        'Tamu' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabIoT', 'prefix' => '/26', 'network' => '192.168.28.0', 'range' => '192.168.28.1 - 192.168.28.62', 'broadcast' => '192.168.28.63'],
                    ['nama' => 'TataUsaha', 'prefix' => '/27', 'network' => '192.168.28.64', 'range' => '192.168.28.65 - 192.168.28.94', 'broadcast' => '192.168.28.95'],
                    ['nama' => 'RuangDosen', 'prefix' => '/28', 'network' => '192.168.28.96', 'range' => '192.168.28.97 - 192.168.28.110', 'broadcast' => '192.168.28.111'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.28.112', 'range' => '192.168.28.113 - 192.168.28.118', 'broadcast' => '192.168.28.119']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sedang',
                'soal' => json_encode([
                    'ip' => '192.168.29.0/24',
                    'kebutuhan' => [
                        'LabMobile' => 70,
                        'Staff' => 30,
                        'Perpustakaan' => 15,
                        'Tamu' => 6
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'LabMobile', 'prefix' => '/25', 'network' => '192.168.29.0', 'range' => '192.168.29.1 - 192.168.29.126', 'broadcast' => '192.168.29.127'],
                    ['nama' => 'Staff', 'prefix' => '/27', 'network' => '192.168.29.128', 'range' => '192.168.29.129 - 192.168.29.158', 'broadcast' => '192.168.29.159'],
                    ['nama' => 'Perpustakaan', 'prefix' => '/27', 'network' => '192.168.29.160', 'range' => '192.168.29.161 - 192.168.29.190', 'broadcast' => '192.168.29.191'],
                    ['nama' => 'Tamu', 'prefix' => '/29', 'network' => '192.168.29.192', 'range' => '192.168.29.193 - 192.168.29.198', 'broadcast' => '192.168.29.199']
                ])
            ],

            // SULIT
            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '172.16.0.0/16',
                    'kebutuhan' => [
                        'FakultasTeknik' => 500,
                        'FakultasEkonomi' => 300,
                        'LabKomputer' => 120,
                        'Server' => 60
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'FakultasTeknik', 'prefix' => '/23', 'network' => '172.16.0.0', 'range' => '172.16.0.1 - 172.16.1.254', 'broadcast' => '172.16.1.255'],
                    ['nama' => 'FakultasEkonomi', 'prefix' => '/23', 'network' => '172.16.2.0', 'range' => '172.16.2.1 - 172.16.3.254', 'broadcast' => '172.16.3.255'],
                    ['nama' => 'LabKomputer', 'prefix' => '/25', 'network' => '172.16.4.0', 'range' => '172.16.4.1 - 172.16.4.126', 'broadcast' => '172.16.4.127'],
                    ['nama' => 'Server', 'prefix' => '/26', 'network' => '172.16.4.128', 'range' => '172.16.4.129 - 172.16.4.190', 'broadcast' => '172.16.4.191']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '172.16.1.0/16',
                    'kebutuhan' => [
                        'FakultasHukum' => 600,
                        'FakultasPertanian' => 250,
                        'LabJaringan' => 150,
                        'DataCenter' => 80
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'FakultasHukum', 'prefix' => '/22', 'network' => '172.16.0.0', 'range' => '172.16.0.1 - 172.16.3.254', 'broadcast' => '172.16.3.255'],
                    ['nama' => 'FakultasPertanian', 'prefix' => '/24', 'network' => '172.16.4.0', 'range' => '172.16.4.1 - 172.16.4.254', 'broadcast' => '172.16.4.255'],
                    ['nama' => 'LabJaringan', 'prefix' => '/24', 'network' => '172.16.5.0', 'range' => '172.16.5.1 - 172.16.5.254', 'broadcast' => '172.16.5.255'],
                    ['nama' => 'DataCenter', 'prefix' => '/25', 'network' => '172.16.6.0', 'range' => '172.16.6.1 - 172.16.6.126', 'broadcast' => '172.16.6.127']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '172.16.2.0/16',
                    'kebutuhan' => [
                        'FakultasKedokteran' => 700,
                        'FakultasSains' => 300,
                        'LabRiset' => 120,
                        'Server' => 60
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'FakultasKedokteran', 'prefix' => '/22', 'network' => '172.16.0.0', 'range' => '172.16.0.1 - 172.16.3.254', 'broadcast' => '172.16.3.255'],
                    ['nama' => 'FakultasSains', 'prefix' => '/23', 'network' => '172.16.4.0', 'range' => '172.16.4.1 - 172.16.5.254', 'broadcast' => '172.16.5.255'],
                    ['nama' => 'LabRiset', 'prefix' => '/25', 'network' => '172.16.6.0', 'range' => '172.16.6.1 - 172.16.6.126', 'broadcast' => '172.16.6.127'],
                    ['nama' => 'Server', 'prefix' => '/26', 'network' => '172.16.6.128', 'range' => '172.16.6.129 - 172.16.6.190', 'broadcast' => '172.16.6.191']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '172.16.3.0/16',
                    'kebutuhan' => [
                        'FakultasTeknik' => 500,
                        'FakultasBisnis' => 400,
                        'LabAI' => 150,
                        'DataCenter' => 80
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'FakultasTeknik', 'prefix' => '/23', 'network' => '172.16.0.0', 'range' => '172.16.0.1 - 172.16.1.254', 'broadcast' => '172.16.1.255'],
                    ['nama' => 'FakultasBisnis', 'prefix' => '/23', 'network' => '172.16.2.0', 'range' => '172.16.2.1 - 172.16.3.254', 'broadcast' => '172.16.3.255'],
                    ['nama' => 'LabAI', 'prefix' => '/24', 'network' => '172.16.4.0', 'range' => '172.16.4.1 - 172.16.4.254', 'broadcast' => '172.16.4.255'],
                    ['nama' => 'DataCenter', 'prefix' => '/25', 'network' => '172.16.5.0', 'range' => '172.16.5.1 - 172.16.5.126', 'broadcast' => '172.16.5.127']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '172.16.4.0/16',
                    'kebutuhan' => [
                        'FakultasIlmuKomputer' => 600,
                        'FakultasSosial' => 350,
                        'LabData' => 120,
                        'Server' => 60
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'FakultasIlmuKomputer', 'prefix' => '/22', 'network' => '172.16.0.0', 'range' => '172.16.0.1 - 172.16.3.254', 'broadcast' => '172.16.3.255'],
                    ['nama' => 'FakultasSosial', 'prefix' => '/23', 'network' => '172.16.4.0', 'range' => '172.16.4.1 - 172.16.5.254', 'broadcast' => '172.16.5.255'],
                    ['nama' => 'LabData', 'prefix' => '/25', 'network' => '172.16.6.0', 'range' => '172.16.6.1 - 172.16.6.126', 'broadcast' => '172.16.6.127'],
                    ['nama' => 'Server', 'prefix' => '/26', 'network' => '172.16.6.128', 'range' => '172.16.6.129 - 172.16.6.190', 'broadcast' => '172.16.6.191']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '10.0.0.0/8',
                    'kebutuhan' => [
                        'KampusUtama' => 1000,
                        'KampusCabang' => 500,
                        'LabTerpadu' => 200,
                        'DataCenter' => 100
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'KampusUtama', 'prefix' => '/22', 'network' => '10.0.0.0', 'range' => '10.0.0.1 - 10.0.3.254', 'broadcast' => '10.0.3.255'],
                    ['nama' => 'KampusCabang', 'prefix' => '/23', 'network' => '10.0.4.0', 'range' => '10.0.4.1 - 10.0.5.254', 'broadcast' => '10.0.5.255'],
                    ['nama' => 'LabTerpadu', 'prefix' => '/24', 'network' => '10.0.6.0', 'range' => '10.0.6.1 - 10.0.6.254', 'broadcast' => '10.0.6.255'],
                    ['nama' => 'DataCenter', 'prefix' => '/25', 'network' => '10.0.7.0', 'range' => '10.0.7.1 - 10.0.7.126', 'broadcast' => '10.0.7.127']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '10.1.0.0/8',
                    'kebutuhan' => [
                        'KantorPusat' => 1200,
                        'KantorCabang' => 600,
                        'LabIT' => 250,
                        'Server' => 120
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'KantorPusat', 'prefix' => '/21', 'network' => '10.0.0.0', 'range' => '10.0.0.1 - 10.0.7.254', 'broadcast' => '10.0.7.255'],
                    ['nama' => 'KantorCabang', 'prefix' => '/22', 'network' => '10.0.8.0', 'range' => '10.0.8.1 - 10.0.11.254', 'broadcast' => '10.0.11.255'],
                    ['nama' => 'LabIT', 'prefix' => '/24', 'network' => '10.0.12.0', 'range' => '10.0.12.1 - 10.0.12.254', 'broadcast' => '10.0.12.255'],
                    ['nama' => 'Server', 'prefix' => '/25', 'network' => '10.0.13.0', 'range' => '10.0.13.1 - 10.0.13.126', 'broadcast' => '10.0.13.127']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '10.2.0.0/8',
                    'kebutuhan' => [
                        'KampusA' => 1500,
                        'KampusB' => 700,
                        'LabRiset' => 300,
                        'DataCenter' => 150
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'KampusA', 'prefix' => '/21', 'network' => '10.0.0.0', 'range' => '10.0.0.1 - 10.0.7.254', 'broadcast' => '10.0.7.255'],
                    ['nama' => 'KampusB', 'prefix' => '/22', 'network' => '10.0.8.0', 'range' => '10.0.8.1 - 10.0.11.254', 'broadcast' => '10.0.11.255'],
                    ['nama' => 'LabRiset', 'prefix' => '/23', 'network' => '10.0.12.0', 'range' => '10.0.12.1 - 10.0.13.254', 'broadcast' => '10.0.13.255'],
                    ['nama' => 'DataCenter', 'prefix' => '/24', 'network' => '10.0.14.0', 'range' => '10.0.14.1 - 10.0.14.254', 'broadcast' => '10.0.14.255']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '165.100.0.0/16',
                    'kebutuhan' => [
                        'DivisiIT' => 800,
                        'DivisiKeuangan' => 400,
                        'LabTraining' => 200,
                        'Server' => 100
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'DivisiIT', 'prefix' => '/22', 'network' => '165.100.0.0', 'range' => '165.100.0.1 - 165.100.3.254', 'broadcast' => '165.100.3.255'],
                    ['nama' => 'DivisiKeuangan', 'prefix' => '/23', 'network' => '165.100.4.0', 'range' => '165.100.4.1 - 165.100.5.254', 'broadcast' => '165.100.5.255'],
                    ['nama' => 'LabTraining', 'prefix' => '/24', 'network' => '165.100.6.0', 'range' => '165.100.6.1 - 165.100.6.254', 'broadcast' => '165.100.6.255'],
                    ['nama' => 'Server', 'prefix' => '/25', 'network' => '165.100.7.0', 'range' => '165.100.7.1 - 165.100.7.126', 'broadcast' => '165.100.7.127']
                ])
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'VLSM',
                'tipe_soal' => 'vlsm',
                'tingkat' => 'sulit',
                'soal' => json_encode([
                    'ip' => '165.101.0.0/16',
                    'kebutuhan' => [
                        'DivisiOperasional' => 900,
                        'DivisiHR' => 500,
                        'LabTesting' => 250,
                        'DataCenter' => 120
                    ]
                ]),
                'jawaban_benar' => json_encode([
                    ['nama' => 'DivisiOperasional', 'prefix' => '/22', 'network' => '165.101.0.0', 'range' => '165.101.0.1 - 165.101.3.254', 'broadcast' => '165.101.3.255'],
                    ['nama' => 'DivisiHR', 'prefix' => '/23', 'network' => '165.101.4.0', 'range' => '165.101.4.1 - 165.101.5.254', 'broadcast' => '165.101.5.255'],
                    ['nama' => 'LabTesting', 'prefix' => '/24', 'network' => '165.101.6.0', 'range' => '165.101.6.1 - 165.101.6.254', 'broadcast' => '165.101.6.255'],
                    ['nama' => 'DataCenter', 'prefix' => '/25', 'network' => '165.101.7.0', 'range' => '165.101.7.1 - 165.101.7.126', 'broadcast' => '165.101.7.127']
                ])
            ],
        ]);
    }

    private function seedKuisBab3()
    {
        DB::table('bank_soal')->insert([

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam sebuah jaringan komputer skala besar, administrator berencana menerapkan teknik subnetting untuk meningkatkan efisiensi dan mempermudah pengelolaan jaringan. Proses yang dilakukan oleh administrator tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Menggabungkan beberapa jaringan kecil menjadi satu jaringan besar",
                    "b" => "Mengubah alamat IP menjadi alamat MAC",
                    "c" => "Membagi satu jaringan besar menjadi beberapa jaringan kecil",
                    "d" => "Menghubungkan jaringan tanpa menggunakan router",
                    "e" => "Menambah jumlah host dalam satu jaringan tanpa batas"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Sebuah perusahaan memiliki jaringan dengan alamat 192.168.1.0/24 dan ingin membaginya menjadi beberapa subnet dengan meminjam 3 bit dari bagian host. Jumlah subnet yang dihasilkan adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "8",
                    "b" => "6",
                    "c" => "4",
                    "d" => "16",
                    "e" => "32"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Seorang administrator melakukan subnetting dengan meminjam bit dari bagian host. Ia menyadari bahwa hal ini memengaruhi jumlah subnet dan host. Jika semakin banyak bit host yang dipinjam, maka dampak yang terjadi adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Jumlah subnet berkurang dan host bertambah",
                    "b" => "Jumlah subnet bertambah dan host tetap",
                    "c" => "Jumlah subnet tetap dan host berkurang",
                    "d" => "Jumlah subnet bertambah dan host berkurang",
                    "e" => "Jumlah subnet dan host sama-sama bertambah"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Sebuah jaringan kantor menggunakan alamat 192.168.1.0/26. Untuk mengatur pembagian jaringan, administrator perlu menentukan nilai blok subnet. Nilai blok subnet tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "32",
                    "b" => "64",
                    "c" => "60",
                    "d" => "128",
                    "e" => "256"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => ' Dalam sebuah jaringan kantor dengan alamat 192.168.1.0/26, administrator ingin mengetahui alamat network pada subnet ke-3 untuk keperluan pembagian ruangan. Alamat tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.1.32",
                    "b" => "192.168.1.64",
                    "c" => "192.168.1.96",
                    "d" => "192.168.1.192",
                    "e" => "192.168.1.128"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Sebuah jaringan kantor menggunakan alamat 192.168.1.0/26 untuk membagi jaringan ke beberapa bagian ruangan. Administrator ingin mengetahui alamat Broadcast pada subnet ke-2 untuk keperluan pengaturan jaringan. Alamat tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.1.62",
                    "b" => "192.168.1.63",
                    "c" => "192.168.1.95",
                    "d" => "192.168.1.126",
                    "e" => "192.168.1.127"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Sebuah jaringan akan dibagi menggunakan metode <i>VLSM</i> dengan kebutuhan host sebagai berikut:<br><br>50, 25, 10, dan 5 host.<br><br>Agar penggunaan alamat <i>IP</i> efisien dan tidak terjadi pemborosan, urutan alokasi <i>subnet</i> yang paling tepat adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "5 -> 10 -> 25 -> 50",
                    "b" => "10 -> 5 -> 25 -> 50",
                    "c" => "25 -> 50 -> 10 -> 5",
                    "d" => "50 -> 25 -> 10 -> 5",
                    "e" => "50 -> 10 -> 25 -> 5"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Diketahui jaringan 192.168.10.0/24. Kebutuhan host:<br>
                A = 50 host<br>
                B = 25 host<br>
                C = 10 host<br><br>
                Prefix untuk jaringan A (50 host) adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "/25",
                    "b" => "/26",
                    "c" => "/27",
                    "d" => "/28",
                    "e" => "/29"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Diketahui jaringan 192.168.10.0/24. Alamat IP pertama dialokasikan untuk kebutuhan 50 host dengan prefix /26 dimulai dari network awal (192.168.10.0). Maka network address untuk subnet berikutnya adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.10.64",
                    "b" => "192.168.10.32",
                    "c" => "192.168.10.128",
                    "d" => "192.168.10.16",
                    "e" => "192.168.10.96"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Subnetting',
                'subbab' => 'Kuis Bab 3',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Diketahui jaringan <b>192.168.10.0/24</b>. Kebutuhan:<br>
                <ul>
                <li>50 host -> /26</li>
                <li>25 host -> /27</li>
                </ul>
                Jika subnet pertama mulai dari <b>192.168.10.0</b>, maka <i>network address</i> untuk subnet kedua adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.10.32",
                    "b" => "192.168.10.96",
                    "c" => "192.168.10.128",
                    "d" => "192.168.10.64",
                    "e" => "192.168.10.16"
                ]),
                'jawaban_benar' => 'd'
            ],
        ]);
    }

    private function seedEvaluasi()
    {
        DB::table('bank_soal')->insert([

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam dunia komputer, data seperti gambar, suara, dan video tidak dipahami secara langsung oleh manusia, melainkan diproses dalam bentuk bilangan tertentu. Sistem bilangan yang hanya menggunakan angka 0 dan 1 disebut ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Desimal",
                    "b" => "Oktal",
                    "c" => "Biner",
                    "d" => "Heksadesimal",
                    "e" => "Real"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam sistem komputer, sekumpulan bit digunakan untuk merepresentasikan data. Jika 1 byte terdiri dari sejumlah bit tertentu, maka jumlah bit dalam 1 byte adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "4 bit",
                    "b" => "6 bit",
                    "c" => "16 bit",
                    "d" => "8 bit",
                    "e" => "32 bit"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam sebuah jaringan komputer, setiap perangkat harus memiliki identitas unik agar dapat saling berkomunikasi dengan benar. Identitas tersebut dikenal sebagai ....',
                'pilgan_opsi' => json_encode([
                    "a" => "MAC Address",
                    "b" => "IP Address",
                    "c" => "Subnet Mask",
                    "d" => "Gateway",
                    "e" => "DNS"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'mudah',
                'soal' => 'Dalam jaringan lokal seperti di rumah atau sekolah, alamat IP yang digunakan tidak dapat diakses langsung dari internet. Jenis alamat IP tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "IP Publik",
                    "b" => "IP Global",
                    "c" => "IP Multicast",
                    "d" => "IP Broadcast",
                    "e" => "IP Privat"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Perhatikan bilangan biner <b>00001010<sub>2</sub></b>. Jika dikonversi ke dalam bilangan desimal, nilai yang dihasilkan adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "10",
                    "b" => "9",
                    "c" => "8",
                    "d" => "12",
                    "e" => "14"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Sebuah komputer menerima data dalam bentuk biner:<br>
                <b>11001010<sub>2</sub></b><br>
                Jika dikonversi ke bentuk desimal, hasilnya adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "198",
                    "b" => "200",
                    "c" => "204",
                    "d" => "202",
                    "e" => "206"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Dalam proses konversi desimal ke biner, bilangan 
                 <b>25<sub>10</sub></b> akan diubah menjadi bentuk biner 8-bit. 
                 Hasil yang benar adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "00011001",
                    "b" => "00010101",
                    "c" => "00100101",
                    "d" => "00011100",
                    "e" => "00101001"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Sebuah alamat IP memiliki oktet pertama bernilai 192. Berdasarkan aturan pengelompokan IP address, alamat tersebut termasuk ke dalam kelas ....',
                'pilgan_opsi' => json_encode([
                    "a" => "A",
                    "b" => "B",
                    "c" => "C",
                    "d" => "D",
                    "e" => "E"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sedang',
                'soal' => 'Perhatikan beberapa alamat IP berikut:<br>
                    1) 192.168.1.1<br>
                    2) 192.168.1.256<br>
                    3) 10.10.10<br>
                    4) 256.1.1.1<br><br>
                    Alamat IP yang valid ditunjukkan oleh nomor ....',
                'pilgan_opsi' => json_encode([
                    "a" => "1 saja",
                    "b" => "2 saja",
                    "c" => "1 dan 3",
                    "d" => "2 dan 4",
                    "e" => "Semua benar"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Perhatikan pernyataan berikut terkait alamat IP 
                    <b>192.168.10.25</b> dalam konsep <i>classful addressing</i>:<br>
                    1) Alamat IP tersebut termasuk dalam kelas C<br>
                    2) Network ID dari alamat IP tersebut adalah 192.168.10<br>
                    3) Host ID dari alamat IP tersebut adalah 25<br>
                    4) Network ID ditentukan dari dua oktet pertama<br>
                    5) Alamat tersebut berada dalam jaringan kelas B<br><br>
                    Pernyataan yang benar ditunjukkan oleh nomor ....',
                'pilgan_opsi' => json_encode([
                    "a" => "(1), (2), dan (3)",
                    "b" => "(2), (3), dan (5)",
                    "c" => "(1), (2), dan (3)",
                    "d" => "(1), (3), dan (5)",
                    "e" => "(2), (4), dan (5)"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Perhatikan pernyataan berikut terkait <b>subnet mask</b>:<br>
                    1) Bit bernilai 1 menunjukkan bagian network<br>
                    2) Bit bernilai 0 menunjukkan bagian host<br>
                    3) Semua bit bernilai 1 menunjukkan broadcast address<br>
                    4) Subnet mask digunakan untuk memisahkan network dan host<br>
                    5) Subnet mask menentukan alamat IP publik<br><br>
                    Pernyataan yang benar ditunjukkan oleh nomor ....',
                'pilgan_opsi' => json_encode([
                    "a" => "(1), (3), dan (5)",
                    "b" => "(1), (2), dan (4)",
                    "c" => "(2), (3), dan (4)",
                    "d" => "(1), (2), dan (5)",
                    "e" => "(3), (4), dan (5)"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Dalam metode CIDR, penulisan IP menggunakan prefix. Prefix /26 memiliki subnet mask ....',
                'pilgan_opsi' => json_encode([
                    "a" => "255.255.255.0",
                    "b" => "255.255.255.128",
                    "c" => "255.255.255.224",
                    "d" => "255.255.255.192",
                    "e" => "255.255.255.240"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Sebuah sekolah menggunakan jaringan dengan prefix /26 untuk setiap laboratorium komputer. Jumlah host valid yang dapat digunakan pada setiap subnet adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "30",
                    "b" => "62",
                    "c" => "64",
                    "d" => "126",
                    "e" => "254"
                ]),
                'jawaban_benar' => 'b'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Perhatikan alamat IP berikut:<br>
                IP Address : <b>192.168.1.10</b><br>
                Subnet Mask : <b>255.255.255.0</b><br><br>
                Berdasarkan data tersebut, network address yang dihasilkan adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.1.10",
                    "b" => "192.168.1.255",
                    "c" => "192.168.1.0",
                    "d" => "192.168.0.0",
                    "e" => "192.168.10.0"
                ]),
                'jawaban_benar' => 'c'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Perhatikan jaringan berikut:<br>
                <b>192.168.1.0/27</b><br><br>
                Pernyataan yang benar terkait jaringan tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Jumlah host valid adalah 62",
                    "b" => "Blok subnet adalah 16",
                    "c" => "Jumlah subnet adalah 4",
                    "d" => "Subnet mask adalah 255.255.255.224",
                    "e" => "Prefix menunjukkan 27 bit host"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Sebuah Sebuah perusahaan memiliki jaringan dengan alamat 192.168.1.0/24. Untuk meningkatkan efisiensi jaringan, administrator melakukan subnetting dengan meminjam 2 bit dari bagian host. Jumlah subnet yang dihasilkan adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "4",
                    "b" => "64",
                    "c" => "6",
                    "d" => "8",
                    "e" => "16"
                ]),
                'jawaban_benar' => 'a'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Seorang administrator jaringan melakukan subnetting dengan meminjam beberapa bit dari bagian host. Dampak dari tindakan tersebut adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Jumlah subnet berkurang",
                    "b" => "Jumlah host bertambah",
                    "c" => "Jumlah subnet tetap",
                    "d" => "Tidak ada perubahan",
                    "e" => "Jumlah subnet bertambah dan host berkurang"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Sebuah sekolah memiliki jaringan dengan alamat <b>192.168.1.0/24</b>.<br>
                Administrator jaringan ingin membagi jaringan tersebut menjadi beberapa subnet 
                agar setiap subnet dapat menampung maksimal <b>30 host</b>.<br><br>
                Berdasarkan kebutuhan tersebut, pernyataan yang <b>PALING TEPAT</b> adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "Menggunakan prefix /25 karena menghasilkan 126 host per subnet",
                    "b" => "Menggunakan prefix /26 karena menghasilkan 62 host per subnet",
                    "c" => "Menggunakan prefix /28 karena menghasilkan 14 host per subnet",
                    "d" => "Menggunakan prefix /24 karena menghasilkan 254 host per subnet",
                    "e" => "Menggunakan prefix /27 karena menghasilkan 30 host per subnet"
                ]),
                'jawaban_benar' => 'e'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Diketahui jaringan <b>192.168.1.0/26</b>, alamat broadcast subnet ke-2 adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.1.62",
                    "b" => "192.168.1.63",
                    "c" => "192.168.1.95",
                    "d" => "192.168.1.127",
                    "e" => "192.168.1.126"
                ]),
                'jawaban_benar' => 'd'
            ],

            [
                'bab' => 'Evaluasi',
                'subbab' => 'Evaluasi Akhir',
                'tipe_soal' => 'pilgan',
                'tingkat' => 'sulit',
                'soal' => 'Sebuah gedung sekolah memiliki 2 ruangan laboratorium komputer 
                yang terhubung dalam satu jaringan dengan alamat <b>192.168.10.0/24</b>.<br>
                Ruangan A membutuhkan <b>50 host</b>, sedangkan Ruangan B membutuhkan <b>25 host</b>.<br>
                Administrator jaringan membagi jaringan menggunakan teknik <i>subnetting</i>.<br>
                Subnet pertama dialokasikan untuk Ruangan A dengan prefix <b>/26</b> dimulai dari alamat awal jaringan.<br><br>
                Berdasarkan kasus tersebut, network address yang digunakan untuk Ruangan B adalah ....',
                'pilgan_opsi' => json_encode([
                    "a" => "192.168.10.32",
                    "b" => "192.168.10.96",
                    "c" => "192.168.10.64",
                    "d" => "192.168.10.128",
                    "e" => "192.168.10.16"
                ]),
                'jawaban_benar' => 'c'
            ],
        ]);
    }
}