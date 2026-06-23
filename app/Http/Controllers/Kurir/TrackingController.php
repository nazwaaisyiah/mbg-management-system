<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function index()
    {
        $tracking = DB::connection('db_kurir')->table('tracking')
            ->paginate(15);
        return view('kurir.tracking.index', compact('tracking'));
    }

    public function create()
    {
        $pengiriman = DB::connection('db_kurir')->table('pengiriman')->get();
        return view('kurir.tracking.create', compact('pengiriman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengiriman_id' => 'required|exists:db_kurir.pengiriman,id',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:Pickup,Perjalanan,Diterima',
        ]);

        DB::connection('db_kurir')->table('tracking')->insert([
            'pengiriman_id' => $request->pengiriman_id,
            'lokasi' => $request->lokasi,
            'waktu' => now(),
            'status' => $request->status,
        ]);

        return redirect()->route('kurir.tracking.index')
            ->with('success', 'Tracking berhasil ditambahkan');
    }

    public function show($pengirimanId)
    {
        $tracking = DB::connection('db_kurir')->table('tracking')
            ->where('pengiriman_id', $pengirimanId)
            ->orderBy('waktu')
            ->get();
        
        $pengiriman = DB::connection('db_kurir')->table('pengiriman')
            ->where('id', $pengirimanId)->first();

        return view('kurir.tracking.show', compact('tracking', 'pengiriman'));
    }

    public function destroy($id)
    {
        DB::connection('db_kurir')->table('tracking')
            ->where('id', $id)->delete();

        return redirect()->route('kurir.tracking.index')
            ->with('success', 'Tracking berhasil dihapus');
    }
}
