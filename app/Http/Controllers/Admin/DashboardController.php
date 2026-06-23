<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Monitoring;
use App\Models\Admin\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalSekolah = DB::connection('db_sekolah')->table('sekolah')->count();
        $totalMenu = DB::connection('db_dapur')->table('menu')->count();
        $totalPengiriman = DB::connection('db_kurir')->table('pengiriman')->count();
        $totalBahan = DB::connection('db_gudang')->table('bahan')->count();

        $monitoring = Monitoring::latest()->first();

        // Data untuk chart pengiriman per hari (7 hari terakhir)
        $pengirimanPerHari = DB::connection('db_kurir')->table('pengiriman')
            ->selectRaw('DATE(tanggal) as tanggal, COUNT(*) as total')
            ->where('tanggal', '>=', now()->subDays(7))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Data untuk chart distribusi sekolah
        $distribusiSekolah = DB::connection('db_sekolah')->table('sekolah')
            ->selectRaw('nama_sekolah, COUNT(pesanan_harian.id) as total_pesanan')
            ->leftJoin('pesanan_harian', 'sekolah.id', '=', 'pesanan_harian.sekolah_id')
            ->groupBy('nama_sekolah')
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalSekolah',
            'totalMenu',
            'totalPengiriman',
            'totalBahan',
            'monitoring',
            'pengirimanPerHari',
            'distribusiSekolah'
        ));
    }
}
