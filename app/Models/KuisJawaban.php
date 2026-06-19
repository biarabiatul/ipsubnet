<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisJawaban extends Model
{
    protected $table = 'kuis_jawaban';

    protected $fillable = [
        'id_hasil',
        'id_soal',
        'jawaban_pengguna',
        'status'
    ];
}