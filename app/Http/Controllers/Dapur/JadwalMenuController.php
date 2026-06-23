<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalMenuController extends Controller
{
    public function index()
    {
        $jadwal = DB::connection('db_dapur')->table('jadwal_menu')
            ->join('menu', 'jadwal_menu.menu_id', '=', 'menu.id')
            ->select('jadwal_menu.*', 'menu.nama_menu')
            ->orderBy('tanggal_saji')
            ->paginate(10);
        return view('dapur.jadwal_menu.index', compact('jadwal'));
    }

    public function create()
    {
        $menu = DB::connection('db_dapur')->table('menu')->get();
        return view('dapur.jadwal_menu.create', compact('menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:db_dapur.menu,id',
            'tanggal_saji' => 'required|date',
        ]);

        DB::connection('db_dapur')->table('jadwal_menu')->insert([
            'menu_id' => $request->menu_id,
            'tanggal_saji' => $request->tanggal_saji,
        ]);

        return redirect()->route('dapur.jadwal_menu.index')
            ->with('success', 'Jadwal menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = DB::connection('db_dapur')->table('jadwal_menu')
            ->where('id', $id)->first();
        $menu = DB::connection('db_dapur')->table('menu')->get();
        return view('dapur.jadwal_menu.edit', compact('jadwal', 'menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_id' => 'required|exists:db_dapur.menu,id',
            'tanggal_saji' => 'required|date',
        ]);

        DB::connection('db_dapur')->table('jadwal_menu')
            ->where('id', $id)
            ->update([
                'menu_id' => $request->menu_id,
                'tanggal_saji' => $request->tanggal_saji,
            ]);

        return redirect()->route('dapur.jadwal_menu.index')
            ->with('success', 'Jadwal menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_dapur')->table('jadwal_menu')
            ->where('id', $id)->delete();

        return redirect()->route('dapur.jadwal_menu.index')
            ->with('success', 'Jadwal menu berhasil dihapus');
    }
}
