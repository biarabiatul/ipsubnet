<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilProgres extends Model
{
    protected $table = 'hasil_progres';

    protected $fillable = [
        'id_users',
        'persen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
