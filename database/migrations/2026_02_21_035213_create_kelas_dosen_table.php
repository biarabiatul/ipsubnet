<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas_dosen', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('dosen_id');

            $table->timestamps();

            // foreign key (opsional tapi bagus)
            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->onDelete('cascade');

            $table->foreign('dosen_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // supaya tidak bisa join 2x
            $table->unique(['kelas_id', 'dosen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_dosen');
    }
};