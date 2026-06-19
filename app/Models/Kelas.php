<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas',
        'token',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function dosen()
    {
        return $this->belongsToMany(
            User::class,
            'kelas_dosen',
            'kelas_id',
            'dosen_id'
        );
    }

    public function mahasiswa()
    {
        return $this->hasMany(User::class, 'kelas_id')
                    ->where('role', 'mahasiswa');
    }
}