<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPesanan = DB::connection('db_sekolah')->table('pesanan_harian')->count();
        $pesananDisetujui = DB::connection('db_sekolah')->table('pesanan_harian')
            ->where('status', 'disetujui')->count();
        $pesananPending = DB::connection('db_sekolah')->table('pesanan_harian')
            ->where('status', 'pending')->count();
        $totalKritikSaran = DB::connection('db_sekolah')->table('kritik_saran')->count();

        $pesananTerbaru = DB::connection('db_sekolah')->table('pesanan_harian')
            ->latest('tanggal')
            ->limit(5)
            ->get();

        return view('sekolah.dashboard', compact(
            'totalPesanan',
            'pesananDisetujui',
            'pesananPending',
            'totalKritikSaran',
            'pesananTerbaru'
        ));
    }
}
