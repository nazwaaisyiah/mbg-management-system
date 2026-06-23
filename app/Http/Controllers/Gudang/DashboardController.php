<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBahan = DB::connection('db_gudang')->table('bahan')->count();
        $totalStok = DB::connection('db_gudang')->table('bahan')
            ->sum('stok');
        $bahanKritis = DB::connection('db_gudang')->table('bahan')
            ->whereRaw('stok <= minimum_stok')
            ->count();
        $totalPembelian = DB::connection('db_gudang')->table('pembelian')->count();

        $bahanList = DB::connection('db_gudang')->table('bahan')
            ->selectRaw('nama_bahan, stok, minimum_stok, (stok - minimum_stok) as sisa')
            ->get();

        $pembelianTerbaru = DB::connection('db_gudang')->table('pembelian')
            ->latest('tanggal')
            ->limit(5)
            ->get();

        return view('gudang.dashboard', compact(
            'totalBahan',
            'totalStok',
            'bahanKritis',
            'totalPembelian',
            'bahanList',
            'pembelianTerbaru'
        ));
    }
}
