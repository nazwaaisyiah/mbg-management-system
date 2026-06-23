<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKurir = DB::connection('db_kurir')->table('kurir')->count();
        $totalPengiriman = DB::connection('db_kurir')->table('pengiriman')->count();
        $pengirimanDiterima = DB::connection('db_kurir')->table('pengiriman')
            ->where('status', 'diterima')->count();
        $pengirimanPerjalanan = DB::connection('db_kurir')->table('pengiriman')
            ->where('status', 'perjalanan')->count();

        $pengirimanTerbaru = DB::connection('db_kurir')->table('pengiriman')
            ->latest('tanggal')
            ->limit(5)
            ->get();

        $kurir = DB::connection('db_kurir')->table('kurir')
            ->selectRaw('kurir.nama_kurir, COUNT(pengiriman.id) as total_pengiriman')
            ->leftJoin('pengiriman', 'kurir.id', '=', 'pengiriman.kurir_id')
            ->groupBy('kurir.id', 'kurir.nama_kurir')
            ->get();

        return view('kurir.dashboard', compact(
            'totalKurir',
            'totalPengiriman',
            'pengirimanDiterima',
            'pengirimanPerjalanan',
            'pengirimanTerbaru',
            'kurir'
        ));
    }
}
