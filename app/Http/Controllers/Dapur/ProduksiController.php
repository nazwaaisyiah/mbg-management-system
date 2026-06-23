<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    public function index()
    {
        $produksi = DB::connection('db_dapur')->table('produksi')
            ->join('menu', 'produksi.menu_id', '=', 'menu.id')
            ->select('produksi.*', 'menu.nama_menu')
            ->paginate(10);
        return view('dapur.produksi.index', compact('produksi'));
    }

    public function create()
    {
        $menu = DB::connection('db_dapur')->table('menu')->get();
        return view('dapur.produksi.create', compact('menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:db_dapur.menu,id',
            'tanggal' => 'required|date',
            'jumlah_porsi' => 'required|integer|min:1',
        ]);

        DB::connection('db_dapur')->table('produksi')->insert([
            'menu_id' => $request->menu_id,
            'tanggal' => $request->tanggal,
            'jumlah_porsi' => $request->jumlah_porsi,
            'status' => 'perencanaan',
        ]);

        return redirect()->route('dapur.produksi.index')
            ->with('success', 'Produksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produksi = DB::connection('db_dapur')->table('produksi')
            ->where('id', $id)->first();
        $menu = DB::connection('db_dapur')->table('menu')->get();
        return view('dapur.produksi.edit', compact('produksi', 'menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_id' => 'required|exists:db_dapur.menu,id',
            'tanggal' => 'required|date',
            'jumlah_porsi' => 'required|integer|min:1',
            'status' => 'required|in:perencanaan,produksi,selesai',
        ]);

        DB::connection('db_dapur')->table('produksi')
            ->where('id', $id)
            ->update([
                'menu_id' => $request->menu_id,
                'tanggal' => $request->tanggal,
                'jumlah_porsi' => $request->jumlah_porsi,
                'status' => $request->status,
            ]);

        return redirect()->route('dapur.produksi.index')
            ->with('success', 'Produksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_dapur')->table('produksi')
            ->where('id', $id)->delete();

        return redirect()->route('dapur.produksi.index')
            ->with('success', 'Produksi berhasil dihapus');
    }
}
