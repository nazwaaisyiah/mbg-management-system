<?php

namespace App\Models\Kurir;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurir extends Model
{
    use HasFactory;

    protected $connection = 'db_kurir';
    protected $table = 'kurir';
    protected $guarded = [];
    public $timestamps = false;

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }
}
