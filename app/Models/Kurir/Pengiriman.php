<?php

namespace App\Models\Kurir;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengiriman extends Model
{
    use HasFactory;

    protected $connection = 'db_kurir';
    protected $table = 'pengiriman';
    protected $fillable = [
        'kurir_id',
        'sekolah_id',
        'tanggal',
        'jumlah_porsi',
        'status',
    ];

    public function kurir()
    {
        return $this->belongsTo(Kurir::class, 'kurir_id');
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class, 'pengiriman_id');
    }
}
