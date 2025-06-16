<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kategori;

class WisataController extends Controller
{
    /**
     * Menampilkan halaman daftar wisata, dengan peta dinamis dan filter.
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::all();
        $kategoriAktif = null;
        $wisataQuery = Wisata::query(); // Query utama untuk kartu wisata (dengan paginasi)

        // Cek apakah ada filter kategori yang aktif
        if ($request->has('kategori') && $request->kategori != '') {
            $slugKategori = $request->kategori;
            $kategoriAktif = Kategori::where('slug', $slugKategori)->first();

            if ($kategoriAktif) {
                // Terapkan filter ke query utama
                $wisataQuery->where('kategori_id', $kategoriAktif->id);
            }
        }

        // --- Menampilkan peta dengan data lokasi yang ada ---
        // Buat salinan dari query utama SEBELUM paginasi.
        // Ini akan mengambil SEMUA lokasi yang cocok dengan filter, bukan hanya yang ada di halaman saat ini.
        $lokasiWisataQuery = clone $wisataQuery;
        
        // Ambil data lokasi dari query yang sudah difilter
        $lokasiWisata = $lokasiWisataQuery->whereNotNull('latitude')
                                          ->whereNotNull('longitude')
                                          ->get(['id', 'nama_wisata', 'latitude', 'longitude']);

        // Sekarang, lanjutkan query utama dengan paginasi untuk tampilan kartu
        $wisatas = $wisataQuery->latest()->paginate(9);
        $wisatas->appends($request->query());

        // Kirim semua data yang dibutuhkan ke view
        return view('wisata.index', compact('wisatas', 'kategoris', 'kategoriAktif', 'lokasiWisata'));
    }

    public function show($id)
    {
        $wisata = Wisata::with('kategori')->findOrFail($id);
        return view('wisata.show', compact('wisata'));
    }
}
