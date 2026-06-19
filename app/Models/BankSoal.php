<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    use HasFactory;

    protected $table = 'bank_soal';

    protected $primaryKey = 'id_soal';

    protected $fillable = [
        'kelas_id',
        'created_by',
        'bab',
        'subbab',
        'tingkat',
        'tipe_soal',
        'soal',
        'jawaban_benar'
    ];

    public $timestamps = false;

    // relasi creator
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // relasi kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}