<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = DB::connection('db_dapur')->table('menu')->count();
        $totalProduksi = DB::connection('db_dapur')->table('produksi')->count();
        $produksiSelesai = DB::connection('db_dapur')->table('produksi')
            ->where('status', 'selesai')->count();
        $produksiProses = DB::connection('db_dapur')->table('produksi')
            ->where('status', 'produksi')->count();

        $jadwalMenuHariIni = DB::connection('db_dapur')->table('jadwal_menu')
            ->whereDate('tanggal_saji', today())
            ->count();

        $produksiTerbaru = DB::connection('db_dapur')->table('produksi')
            ->latest('tanggal')
            ->limit(5)
            ->get();

        return view('dapur.dashboard', compact(
            'totalMenu',
            'totalProduksi',
            'produksiSelesai',
            'produksiProses',
            'jadwalMenuHariIni',
            'produksiTerbaru'
        ));
    }
}
