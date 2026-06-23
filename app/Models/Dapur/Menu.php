<?php

namespace App\Models\Dapur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $connection = 'db_dapur';
    protected $table = 'menu';
    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'kalori',
        'harga',
        'status',
    ];

    public function jadwalMenu()
    {
        return $this->hasMany(JadwalMenu::class, 'menu_id');
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'menu_id');
    }
}
