<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Menampilkan daftar semua event yang diajukan.
     */
    public function index()
    {
        // Mengambil semua event dan memuat relasi 'user' untuk menampilkan siapa pengajunya
        $events = Event::with('user')->latest()->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    /**
     * Menyetujui pengajuan event.
     */
    public function approve(Event $event)
    {
        $event->update(['status' => 'disetujui']);
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil disetujui.');
    }

    /**
     * Menolak pengajuan event.
     */
    public function reject(Event $event)
    {
        $event->update(['status' => 'ditolak']);
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditolak.');
    }

    /**
     * Menghapus data event secara permanen.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus permanen.');
    }
}
