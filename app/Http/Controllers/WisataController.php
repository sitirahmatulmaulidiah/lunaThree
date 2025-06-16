<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kategori; // <-- Import model Kategori

class WisataController extends Controller
{
    /**
     * Menampilkan halaman daftar wisata, dengan kemampuan filter berdasarkan kategori.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil semua kategori untuk ditampilkan sebagai pilihan filter
        $kategoris = Kategori::all();
        $kategoriAktif = null;

        // Mulai query dasar untuk wisata
        $wisataQuery = Wisata::query();

        // Cek apakah ada permintaan filter kategori dari URL (misal: /wisata?kategori=wisata-alam)
        if ($request->has('kategori') && $request->kategori != '') {
            $slugKategori = $request->kategori;
            $kategoriAktif = Kategori::where('slug', $slugKategori)->first();

            // Jika kategori ditemukan, filter wisata berdasarkan relasi
            if ($kategoriAktif) {
                $wisataQuery->where('kategori_id', $kategoriAktif->id);
            }
        }

        // Eksekusi query, urutkan dari yang terbaru, dan paginasi hasilnya
        $wisatas = $wisataQuery->latest()->paginate(9);

        // Penting: Tambahkan parameter filter ke link paginasi
        // agar filter tidak hilang saat pindah halaman
        $wisatas->appends($request->query());

        // Kirim data wisatas, kategoris, dan kategori yang sedang aktif ke view
        return view('wisata.index', compact('wisatas', 'kategoris', 'kategoriAktif'));
    }

    /**
     * Menampilkan halaman detail satu wisata.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Pastikan untuk memuat relasi 'kategori' agar bisa ditampilkan di detail
        $wisata = Wisata::with('kategori')->findOrFail($id);
        return view('wisata.show', compact('wisata'));
    }
}
