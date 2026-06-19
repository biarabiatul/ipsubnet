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
        Schema::create('kuis_jawaban', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_hasil');
            $table->foreignId('id_soal');

            $table->string('jawaban_pengguna')->nullable();
            $table->string('jawaban_benar');

            $table->enum('status', ['benar','salah']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuis_jawaban');
    }
};
