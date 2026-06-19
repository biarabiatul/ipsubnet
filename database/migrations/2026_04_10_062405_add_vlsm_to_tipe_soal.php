<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE bank_soal 
            MODIFY tipe_soal ENUM(
                'biner_ke_desimal',
                'desimal_ke_biner',
                'kelas_ip',
                'network_id',
                'host_id',
                'subnet_mask',
                'anding_default',
                'cidr',
                'subnetting',
                'pilgan',
                'essai',
                'publik_privat',
                'vlsm'
            )
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE bank_soal 
            MODIFY tipe_soal ENUM(
                'biner_ke_desimal',
                'desimal_ke_biner',
                'kelas_ip',
                'network_id',
                'host_id',
                'subnet_mask',
                'anding_default',
                'cidr',
                'subnetting',
                'pilgan',
                'essai',
                'publik_privat'
            )
        ");
    }
};