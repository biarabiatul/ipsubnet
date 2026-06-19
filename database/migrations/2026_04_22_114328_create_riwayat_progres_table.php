<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_progres', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_users')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('bab');
            $table->string('subbab');
            $table->enum('status', ['belum', 'selesai']);

            $table->timestamps();

            $table->unique(['id_users', 'bab', 'subbab']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_progres');
    }
};
