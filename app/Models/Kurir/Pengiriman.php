<?php

namespace App\Models\Kurir;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengiriman extends Model
{
    use HasFactory;

    protected $connection = 'db_kurir';
    protected $table = 'pengiriman';
    protected $guarded = [];
    public $timestamps = false;

    public function kurir()
    {
        return $this->belongsTo(Kurir::class);
    }

    public function tracking()
    {
        return $this->hasMany(Tracking::class);
    }
}
