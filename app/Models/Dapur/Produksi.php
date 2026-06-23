<?php

namespace App\Models\Dapur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $connection = 'db_dapur';
    protected $table = 'produksi';
    protected $fillable = [
        'menu_id',
        'tanggal',
        'jumlah_porsi',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
