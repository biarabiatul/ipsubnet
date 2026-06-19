<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatProgres extends Model
{
    protected $table = 'riwayat_progres';

    protected $fillable = [
        'id_users',
        'bab',
        'subbab',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}