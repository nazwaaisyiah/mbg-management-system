<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bahan extends Model
{
    use HasFactory;

    protected $connection = 'db_gudang';
    protected $table = 'bahan';
    protected $fillable = [
        'nama_bahan',
        'stok',
        'satuan',
        'minimum_stok',
    ];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'bahan_id');
    }

    public function permintaanBahan()
    {
        return $this->hasMany(PermintaanBahan::class, 'bahan_id');
    }

    public function isBahanKritis()
    {
        return $this->stok <= $this->minimum_stok;
    }
}
