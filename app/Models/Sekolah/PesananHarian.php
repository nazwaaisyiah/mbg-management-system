<?php

namespace App\Models\Sekolah;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananHarian extends Model
{
    use HasFactory;

    protected $connection = 'db_sekolah';
    protected $table = 'pesanan_harian';
    protected $guarded = [];
    public $timestamps = false;

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
