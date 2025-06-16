<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata; // Pastikan Model Wisata sudah dibuat
use App\Models\Event;  // Pastikan Model Event sudah dibuat

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (beranda).
     *
     * Halaman ini akan menampilkan beberapa data wisata dan event terbaru
     * yang sudah disetujui untuk menarik perhatian pengunjung.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil 6 data wisata terbaru
        $wisatas = Wisata::latest()->take(6)->get();

        // Mengambil 6 data event terbaru yang statusnya 'disetujui'
        $events = Event::where('status', 'disetujui')->latest()->take(6)->get();

        // Mengirim data ke view 'home'
        return view('home', compact('wisatas', 'events'));
    }
}
