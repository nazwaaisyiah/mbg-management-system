<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = DB::connection('db_gudang')->table('pembelian')
            ->join('bahan', 'pembelian.bahan_id', '=', 'bahan.id')
            ->select('pembelian.*', 'bahan.nama_bahan')
            ->paginate(10);
        return view('gudang.pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $bahan = DB::connection('db_gudang')->table('bahan')->get();
        return view('gudang.pembelian.create', compact('bahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bahan_id' => 'required|exists:db_gudang.bahan,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'supplier' => 'required|string|max:255',
        ]);

        DB::connection('db_gudang')->table('pembelian')->insert([
            'bahan_id' => $request->bahan_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'supplier' => $request->supplier,
        ]);

        // Update stok bahan
        DB::connection('db_gudang')->table('bahan')
            ->where('id', $request->bahan_id)
            ->increment('stok', $request->jumlah);

        return redirect()->route('gudang.pembelian.index')
            ->with('success', 'Pembelian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembelian = DB::connection('db_gudang')->table('pembelian')
            ->where('id', $id)->first();
        $bahan = DB::connection('db_gudang')->table('bahan')->get();
        return view('gudang.pembelian.edit', compact('pembelian', 'bahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bahan_id' => 'required|exists:db_gudang.bahan,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'supplier' => 'required|string|max:255',
        ]);

        DB::connection('db_gudang')->table('pembelian')
            ->where('id', $id)
            ->update([
                'bahan_id' => $request->bahan_id,
                'tanggal' => $request->tanggal,
                'jumlah' => $request->jumlah,
                'supplier' => $request->supplier,
            ]);

        return redirect()->route('gudang.pembelian.index')
            ->with('success', 'Pembelian berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_gudang')->table('pembelian')
            ->where('id', $id)->delete();

        return redirect()->route('gudang.pembelian.index')
            ->with('success', 'Pembelian berhasil dihapus');
    }
}
