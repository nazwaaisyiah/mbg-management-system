<?php

namespace App\Models\Sekolah;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananHarian extends Model
{
    use HasFactory;

    protected $connection = 'db_sekolah';
    protected $table = 'pesanan_harian';
    protected $fillable = [
        'sekolah_id',
        'tanggal',
        'jumlah_porsi',
        'menu',
        'status',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
}
