<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class PengajuanEventController extends Controller
{
    public function create()
    {
        return view('pengajuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable|string|max:255', // <-- Validasi untuk waktu
            'tempat_lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('events', 'public');
            $data['gambar'] = $path;
        }

        $data['user_id'] = Auth::id();
        $data['status'] = 'menunggu';

        Event::create($data);

        return redirect()->route('event.index')->with('success', 'Event berhasil diajukan dan sedang menunggu persetujuan admin.');
    }
}
