<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;

    protected $connection = 'db_gudang';
    protected $table = 'pembelian';
    protected $guarded = [];
    public $timestamps = false;

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
}
