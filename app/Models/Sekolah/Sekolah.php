<?php

namespace App\Models\Sekolah;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory;

    protected $connection = 'db_sekolah';
    protected $table = 'sekolah';
    protected $guarded = [];
    public $timestamps = false;

    public function pesananHarian()
    {
        return $this->hasMany(PesananHarian::class);
    }

    public function kritikSaran()
    {
        return $this->hasMany(KritikSaran::class);
    }
}
