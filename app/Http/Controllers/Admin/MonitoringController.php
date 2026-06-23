<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Monitoring;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $monitoring = Monitoring::paginate(10);
        return view('admin.monitoring.index', compact('monitoring'));
    }

    public function create()
    {
        return view('admin.monitoring.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_sekolah' => 'required|integer|min:0',
            'jumlah_pengiriman' => 'required|integer|min:0',
            'jumlah_menu' => 'required|integer|min:0',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        Monitoring::create($request->all());

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Data monitoring berhasil ditambahkan');
    }

    public function edit(Monitoring $monitoring)
    {
        return view('admin.monitoring.edit', compact('monitoring'));
    }

    public function update(Request $request, Monitoring $monitoring)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_sekolah' => 'required|integer|min:0',
            'jumlah_pengiriman' => 'required|integer|min:0',
            'jumlah_menu' => 'required|integer|min:0',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        $monitoring->update($request->all());

        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Data monitoring berhasil diperbarui');
    }

    public function destroy(Monitoring $monitoring)
    {
        $monitoring->delete();
        return redirect()->route('admin.monitoring.index')
            ->with('success', 'Data monitoring berhasil dihapus');
    }
}
