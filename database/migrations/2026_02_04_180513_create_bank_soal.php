<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_soal', function (Blueprint $table) {
            $table->id('id_soal');

            $table->string('bab', 100);
            $table->string('subbab', 150);

            $table->enum('tipe_soal', [
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
                'essai'
            ]);

            $table->text('soal');

            // KHUSUS PILIHAN GANDA
            $table->text('pilgan_opsi')->nullable();

            $table->string('jawaban_benar', 100);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_soal');
    }
};
