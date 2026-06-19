<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'role',
        'nim',
        'nip',
        'kelas_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kelasYangDiajar()
    {
        return $this->belongsToMany(
            Kelas::class,
            'kelas_dosen',
            'dosen_id',
            'kelas_id'
        );
    }

    public function kuisHasil()
    {
        return $this->hasMany(KuisHasil::class, 'id_pengguna');
    }

    public function progres()
    {
        return $this->hasOne(HasilProgres::class, 'id_users');
    }

    public function riwayatProgres()
    {
        return $this->hasMany(\App\Models\RiwayatProgres::class, 'id_users');
    }
}
