<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanController extends Controller
{
    public function index()
    {
        $bahan = DB::connection('db_gudang')->table('bahan')->paginate(10);
        return view('gudang.bahan.index', compact('bahan'));
    }

    public function create()
    {
        return view('gudang.bahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'minimum_stok' => 'required|integer|min:0',
        ]);

        DB::connection('db_gudang')->table('bahan')->insert([
            'nama_bahan' => $request->nama_bahan,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'minimum_stok' => $request->minimum_stok,
        ]);

        return redirect()->route('gudang.bahan.index')
            ->with('success', 'Bahan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bahan = DB::connection('db_gudang')->table('bahan')
            ->where('id', $id)->first();
        return view('gudang.bahan.edit', compact('bahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'minimum_stok' => 'required|integer|min:0',
        ]);

        DB::connection('db_gudang')->table('bahan')
            ->where('id', $id)
            ->update([
                'nama_bahan' => $request->nama_bahan,
                'stok' => $request->stok,
                'satuan' => $request->satuan,
                'minimum_stok' => $request->minimum_stok,
            ]);

        return redirect()->route('gudang.bahan.index')
            ->with('success', 'Bahan berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_gudang')->table('bahan')
            ->where('id', $id)->delete();

        return redirect()->route('gudang.bahan.index')
            ->with('success', 'Bahan berhasil dihapus');
    }
}
