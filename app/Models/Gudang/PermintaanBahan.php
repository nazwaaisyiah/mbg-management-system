<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermintaanBahan extends Model
{
    use HasFactory;

    protected $connection = 'db_gudang';
    protected $table = 'permintaan_bahan';
    protected $fillable = [
        'bahan_id',
        'tanggal',
        'jumlah',
        'status',
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }
}
