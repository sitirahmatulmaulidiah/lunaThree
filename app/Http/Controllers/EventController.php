<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Menampilkan halaman daftar event yang sudah disetujui.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Hanya ambil event yang statusnya 'disetujui'
        $events = Event::where('status', 'disetujui')->latest()->paginate(9);
        return view('event.index', compact('events')); // view di resources/views/event/index.blade.php
    }

    /**
     * Menampilkan halaman detail satu event.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::where('status', 'disetujui')->findOrFail($id);
        return view('event.show', compact('event')); // view di resources/views/event/show.blade.php
    }

    /**
     * Menampilkan form untuk menambah event baru.
     * Hanya bisa diakses oleh user yang sudah login.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('event.create'); // view di resources/views/event/create.blade.php
    }

    /**
     * Menyimpan event baru yang diajukan oleh user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tempat_lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            // 'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Jika ada upload gambar
        ]);

        // Membuat event baru
        Event::create([
            'user_id' => Auth::id(), // Mengambil ID user yang sedang login
            'nama_event' => $request->nama_event,
            'tanggal' => $request->tanggal,
            'tempat_lokasi' => $request->tempat_lokasi,
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu', // Status default saat event diajukan
        ]);

        return redirect()->route('event.index')->with('success', 'Event berhasil diajukan dan sedang menunggu persetujuan admin.');
    }
}
