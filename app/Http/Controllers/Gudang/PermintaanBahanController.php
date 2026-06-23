<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanBahanController extends Controller
{
    public function index()
    {
        $permintaan = DB::connection('db_gudang')->table('permintaan_bahan')
            ->join('bahan', 'permintaan_bahan.bahan_id', '=', 'bahan.id')
            ->select('permintaan_bahan.*', 'bahan.nama_bahan')
            ->paginate(10);
        return view('gudang.permintaan_bahan.index', compact('permintaan'));
    }

    public function create()
    {
        $bahan = DB::connection('db_gudang')->table('bahan')->get();
        return view('gudang.permintaan_bahan.create', compact('bahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bahan_id' => 'required|exists:db_gudang.bahan,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        DB::connection('db_gudang')->table('permintaan_bahan')->insert([
            'bahan_id' => $request->bahan_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
        ]);

        return redirect()->route('gudang.permintaan_bahan.index')
            ->with('success', 'Permintaan bahan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $permintaan = DB::connection('db_gudang')->table('permintaan_bahan')
            ->where('id', $id)->first();
        $bahan = DB::connection('db_gudang')->table('bahan')->get();
        return view('gudang.permintaan_bahan.edit', compact('permintaan', 'bahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bahan_id' => 'required|exists:db_gudang.bahan,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'status' => 'required|in:pending,disetujui,ditolak',
        ]);

        $permintaan = DB::connection('db_gudang')->table('permintaan_bahan')
            ->where('id', $id)->first();

        // Jika status berubah menjadi disetujui, kurangi stok
        if ($request->status === 'disetujui' && $permintaan->status !== 'disetujui') {
            DB::connection('db_gudang')->table('bahan')
                ->where('id', $request->bahan_id)
                ->decrement('stok', $request->jumlah);
        }

        DB::connection('db_gudang')->table('permintaan_bahan')
            ->where('id', $id)
            ->update([
                'bahan_id' => $request->bahan_id,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'status' => $request->status,
            ]);

        return redirect()->route('gudang.permintaan_bahan.index')
            ->with('success', 'Permintaan bahan berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_gudang')->table('permintaan_bahan')
            ->where('id', $id)->delete();

        return redirect()->route('gudang.permintaan_bahan.index')
            ->with('success', 'Permintaan bahan berhasil dihapus');
    }
}
