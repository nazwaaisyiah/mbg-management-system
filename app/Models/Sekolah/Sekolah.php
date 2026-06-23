<?php

namespace App\Models\Sekolah;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory;

    protected $connection = 'db_sekolah';
    protected $table = 'sekolah';
    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'telepon',
        'email',
        'jumlah_siswa',
    ];
}
