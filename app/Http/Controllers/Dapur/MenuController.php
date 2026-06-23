<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menu = DB::connection('db_dapur')->table('menu')->paginate(10);
        return view('dapur.menu.index', compact('menu'));
    }

    public function create()
    {
        return view('dapur.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kalori' => 'nullable|integer',
            'protein' => 'nullable|numeric',
            'karbohidrat' => 'nullable|numeric',
            'lemak' => 'nullable|numeric',
        ]);

        DB::connection('db_dapur')->table('menu')->insert([
            'nama_menu' => $request->nama_menu,
            'kalori' => $request->kalori,
            'protein' => $request->protein,
            'karbohidrat' => $request->karbohidrat,
            'lemak' => $request->lemak,
        ]);

        return redirect()->route('dapur.menu.index')
            ->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $menu = DB::connection('db_dapur')->table('menu')
            ->where('id', $id)->first();
        return view('dapur.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kalori' => 'nullable|integer',
            'protein' => 'nullable|numeric',
            'karbohidrat' => 'nullable|numeric',
            'lemak' => 'nullable|numeric',
        ]);

        DB::connection('db_dapur')->table('menu')
            ->where('id', $id)
            ->update([
                'nama_menu' => $request->nama_menu,
                'kalori' => $request->kalori,
                'protein' => $request->protein,
                'karbohidrat' => $request->karbohidrat,
                'lemak' => $request->lemak,
            ]);

        return redirect()->route('dapur.menu.index')
            ->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::connection('db_dapur')->table('menu')
            ->where('id', $id)->delete();

        return redirect()->route('dapur.menu.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}
