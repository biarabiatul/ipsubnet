<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisHasil extends Model
{
    protected $table = 'kuis_hasil';

    protected $fillable = [
        'id_pengguna',
        'id_kuis',
        'nilai_akhir',
        'total_benar',
        'total_salah',
        'waktu_mengerjakan',
        'kelas_id',
        'start_time',
        'end_time'
    ];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'id_kuis');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}