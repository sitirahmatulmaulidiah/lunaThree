<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class PengajuanEventController extends Controller
{
    /**
     * Menampilkan halaman form untuk mengajukan event baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Kita akan menggunakan view baru untuk menghindari konflik
        return view('pengajuan.create');
    }

    /**
     * Menyimpan data event baru dari form pengajuan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat_lokasi' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Event::create([
            'user_id' => Auth::id(),
            'nama_event' => $request->nama_event,
            'tanggal' => $request->tanggal,
            'tempat_lokasi' => $request->tempat_lokasi,
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu',
        ]);

        return redirect()->route('event.index')->with('success', 'Event berhasil diajukan dan sedang menunggu persetujuan admin.');
    }
}
