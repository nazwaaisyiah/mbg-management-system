<?php

namespace App\Models\Kurir;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tracking extends Model
{
    use HasFactory;

    protected $connection = 'db_kurir';
    protected $table = 'tracking';
    protected $guarded = [];
    public $timestamps = false;

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class);
    }
}
