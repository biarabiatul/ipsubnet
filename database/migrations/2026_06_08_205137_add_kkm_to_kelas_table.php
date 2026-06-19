<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kelas', function (Blueprint $table) {

            $table->integer('kkm_kuis')
                ->default(70);

            $table->integer('kkm_evaluasi')
                ->default(70);

        });
    }

    public function down(): void
    {
        Schema::table('kelas', function (Blueprint $table) {

            $table->dropColumn([
                'kkm_kuis',
                'kkm_evaluasi'
            ]);

        });
    }
};
