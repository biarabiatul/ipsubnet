<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bank_soal', function (Blueprint $table) {

            $table->unsignedBigInteger('kelas_id')
                ->nullable()
                ->after('id_soal');

            $table->unsignedBigInteger('created_by')
                ->nullable()
                ->after('kelas_id');

        });
    }

    public function down(): void
    {
        Schema::table('bank_soal', function (Blueprint $table) {

            $table->dropColumn('kelas_id');
            $table->dropColumn('created_by');

        });
    }
};