<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bahan extends Model
{
    use HasFactory;

    protected $connection = 'db_gudang';
    protected $table = 'bahan';
    protected $guarded = [];
    public $timestamps = false;

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function permintaanBahan()
    {
        return $this->hasMany(PermintaanBahan::class);
    }
}
