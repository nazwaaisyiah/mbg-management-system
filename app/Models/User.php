<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'sekolah_id',
        'dapur_id',
        'kurir_id',
        'gudang_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isSekolah()
    {
        return $this->role === 'sekolah';
    }

    public function isDapur()
    {
        return $this->role === 'dapur';
    }

    public function isKurir()
    {
        return $this->role === 'kurir';
    }

    public function isGudang()
    {
        return $this->role === 'gudang';
    }
}
