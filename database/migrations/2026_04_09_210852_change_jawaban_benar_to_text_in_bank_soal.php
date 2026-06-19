<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bank_soal', function (Blueprint $table) {
            $table->longText('jawaban_benar')->change();
        });
    }

    public function down()
    {
        Schema::table('bank_soal', function (Blueprint $table) {
            $table->string('jawaban_benar', 100)->change();
        });
    }
};