<?php

namespace App\Models\Dapur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produksi extends Model
{
    use HasFactory;

    protected $connection = 'db_dapur';
    protected $table = 'produksi';
    protected $guarded = [];
    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
