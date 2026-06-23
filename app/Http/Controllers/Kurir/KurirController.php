<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = DB::connection('db_kurir')->table('kurir')->paginate(10);
        return view('kurir.kurir.index', compact('kurir'));
    }

    public function create()
    {
        return view('kurir.kurir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kurir' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'kendaraan' => 'required|string|max:255',
        ]);

        DB::connection('db_kurir')->table('kurir')->insert([
            'nama_kurir' => $request->nama_kurir,
            'telepon' => $request->telepon,
            'kendaraan' => $request->kendaraan,
        ]);

        return redirect()->route('kurir.kurir.index')
            ->with('success', 'Kurir berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kurir = DB::connection('db_kurir')->table('kurir')
            ->where('id', $id)->first();
        return view('kurir.kurir.edit', compact('kurir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kurir' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'kendaraan' => 'required|string|max:255',
        ]);

        DB::connection('db_kurir')->table('kurir')
            ->where('id', $id)
            ->update([
                'nama_kurir' => $request->nama_kurir,
                'telepon' => $request->telepon,
                'kendaraan' => $request->kendaraan,
            ]);

        return redirect()->route('kurir.kurir.index')
            ->with('success', 'Kurir berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_kurir')->table('kurir')
            ->where('id', $id)->delete();

        return redirect()->route('kurir.kurir.index')
            ->with('success', 'Kurir berhasil dihapus');
    }
}
