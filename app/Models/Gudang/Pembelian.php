<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;

    protected $connection = 'db_gudang';
    protected $table = 'pembelian';
    protected $fillable = [
        'bahan_id',
        'tanggal',
        'jumlah',
        'supplier',
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }
}
