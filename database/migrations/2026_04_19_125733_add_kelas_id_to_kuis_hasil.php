<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kuis_hasil', function (Blueprint $table) {
            $table->unsignedBigInteger('kelas_id')->nullable()->after('id_kuis');
        });
    }

    public function down(): void
    {
        Schema::table('kuis_hasil', function (Blueprint $table) {
            $table->dropColumn('kelas_id');
        });
    }
};
