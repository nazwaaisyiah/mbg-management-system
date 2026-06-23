<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use App\Models\Sekolah\PesananHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananHarianController extends Controller
{
    public function index()
    {
        $pesanan = DB::connection('db_sekolah')->table('pesanan_harian')
            ->paginate(10);
        return view('sekolah.pesanan_harian.index', compact('pesanan'));
    }

    public function create()
    {
        $sekolah = DB::connection('db_sekolah')->table('sekolah')->get();
        return view('sekolah.pesanan_harian.create', compact('sekolah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:db_sekolah.sekolah,id',
            'tanggal' => 'required|date',
            'jumlah_porsi' => 'required|integer|min:1',
        ]);

        DB::connection('db_sekolah')->table('pesanan_harian')->insert([
            'sekolah_id' => $request->sekolah_id,
            'tanggal' => $request->tanggal,
            'jumlah_porsi' => $request->jumlah_porsi,
            'status' => 'pending',
        ]);

        return redirect()->route('sekolah.pesanan_harian.index')
            ->with('success', 'Pesanan berhasil dibuat');
    }

    public function edit($id)
    {
        $pesanan = DB::connection('db_sekolah')->table('pesanan_harian')
            ->where('id', $id)->first();
        $sekolah = DB::connection('db_sekolah')->table('sekolah')->get();
        return view('sekolah.pesanan_harian.edit', compact('pesanan', 'sekolah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:db_sekolah.sekolah,id',
            'tanggal' => 'required|date',
            'jumlah_porsi' => 'required|integer|min:1',
        ]);

        DB::connection('db_sekolah')->table('pesanan_harian')
            ->where('id', $id)
            ->update([
                'sekolah_id' => $request->sekolah_id,
                'tanggal' => $request->tanggal,
                'jumlah_porsi' => $request->jumlah_porsi,
            ]);

        return redirect()->route('sekolah.pesanan_harian.index')
            ->with('success', 'Pesanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_sekolah')->table('pesanan_harian')
            ->where('id', $id)->delete();

        return redirect()->route('sekolah.pesanan_harian.index')
            ->with('success', 'Pesanan berhasil dihapus');
    }
}
