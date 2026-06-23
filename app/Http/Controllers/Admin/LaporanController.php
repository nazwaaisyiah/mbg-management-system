<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::paginate(10);
        return view('admin.laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('admin.laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Laporan::create($request->all());

        return redirect()->route('admin.laporan.index')
            ->with('success', 'Laporan berhasil ditambahkan');
    }

    public function show(Laporan $laporan)
    {
        return view('admin.laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('admin.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $laporan->update($request->all());

        return redirect()->route('admin.laporan.index')
            ->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('admin.laporan.index')
            ->with('success', 'Laporan berhasil dihapus');
    }
}
