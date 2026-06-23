<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritikSaran = DB::connection('db_sekolah')->table('kritik_saran')
            ->paginate(10);
        return view('sekolah.kritik_saran.index', compact('kritikSaran'));
    }

    public function create()
    {
        $sekolah = DB::connection('db_sekolah')->table('sekolah')->get();
        return view('sekolah.kritik_saran.create', compact('sekolah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id' => 'required|exists:db_sekolah.sekolah,id',
            'pesan' => 'required|string',
        ]);

        DB::connection('db_sekolah')->table('kritik_saran')->insert([
            'sekolah_id' => $request->sekolah_id,
            'pesan' => $request->pesan,
            'tanggal' => now()->toDateString(),
        ]);

        return redirect()->route('sekolah.kritik_saran.index')
            ->with('success', 'Kritik dan saran berhasil dikirim');
    }

    public function destroy($id)
    {
        DB::connection('db_sekolah')->table('kritik_saran')
            ->where('id', $id)->delete();

        return redirect()->route('sekolah.kritik_saran.index')
            ->with('success', 'Kritik dan saran berhasil dihapus');
    }
}
