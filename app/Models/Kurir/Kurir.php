<?php

namespace App\Models\Kurir;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurir extends Model
{
    use HasFactory;

    protected $connection = 'db_kurir';
    protected $table = 'kurir';
    protected $fillable = [
        'nama_kurir',
        'telepon',
        'kendaraan',
    ];

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'kurir_id');
    }
}
