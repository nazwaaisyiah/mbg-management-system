<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = DB::connection('db_kurir')->table('pengiriman')
            ->join('kurir', 'pengiriman.kurir_id', '=', 'kurir.id')
            ->select('pengiriman.*', 'kurir.nama_kurir')
            ->paginate(10);
        return view('kurir.pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $kurir = DB::connection('db_kurir')->table('kurir')->get();
        $sekolah = DB::connection('db_sekolah')->table('sekolah')->get();
        return view('kurir.pengiriman.create', compact('kurir', 'sekolah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kurir_id' => 'required|exists:db_kurir.kurir,id',
            'sekolah_id' => 'required|exists:db_sekolah.sekolah,id',
            'tanggal' => 'required|date',
            'jumlah_porsi' => 'required|integer|min:1',
        ]);

        DB::connection('db_kurir')->table('pengiriman')->insert([
            'kurir_id' => $request->kurir_id,
            'sekolah_id' => $request->sekolah_id,
            'tanggal' => $request->tanggal,
            'jumlah_porsi' => $request->jumlah_porsi,
            'status' => 'perjalanan',
        ]);

        return redirect()->route('kurir.pengiriman.index')
            ->with('success', 'Pengiriman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengiriman = DB::connection('db_kurir')->table('pengiriman')
            ->where('id', $id)->first();
        $kurir = DB::connection('db_kurir')->table('kurir')->get();
        $sekolah = DB::connection('db_sekolah')->table('sekolah')->get();
        return view('kurir.pengiriman.edit', compact('pengiriman', 'kurir', 'sekolah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kurir_id' => 'required|exists:db_kurir.kurir,id',
            'sekolah_id' => 'required|exists:db_sekolah.sekolah,id',
            'tanggal' => 'required|date',
            'jumlah_porsi' => 'required|integer|min:1',
            'status' => 'required|in:perjalanan,diterima',
        ]);

        DB::connection('db_kurir')->table('pengiriman')
            ->where('id', $id)
            ->update([
                'kurir_id' => $request->kurir_id,
                'sekolah_id' => $request->sekolah_id,
                'tanggal' => $request->tanggal,
                'jumlah_porsi' => $request->jumlah_porsi,
                'status' => $request->status,
            ]);

        return redirect()->route('kurir.pengiriman.index')
            ->with('success', 'Pengiriman berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_kurir')->table('pengiriman')
            ->where('id', $id)->delete();

        return redirect()->route('kurir.pengiriman.index')
            ->with('success', 'Pengiriman berhasil dihapus');
    }
}
