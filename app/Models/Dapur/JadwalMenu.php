<?php

namespace App\Models\Dapur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalMenu extends Model
{
    use HasFactory;

    protected $connection = 'db_dapur';
    protected $table = 'jadwal_menu';
    protected $fillable = [
        'menu_id',
        'hari',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
