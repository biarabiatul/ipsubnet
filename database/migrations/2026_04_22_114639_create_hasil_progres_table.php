<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hasil_progres', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_users')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->integer('persen')->default(0);

            $table->timestamps();

            $table->unique('id_users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_progres');
    }
};