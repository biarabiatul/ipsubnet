<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kuis_hasil', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_kuis');

            $table->integer('nilai_akhir');
            $table->integer('total_benar');
            $table->integer('total_salah');

            $table->integer('waktu_mengerjakan')->nullable();

            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuis_hasil');
    }
};
