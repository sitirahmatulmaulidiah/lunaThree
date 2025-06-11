<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\KategoriWisata;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $kategori_id = $request->kategori;

        $kategori = KategoriWisata::all();

        // Jika kategori dipilih
        if($kategori_id){
            $wisata = Wisata::where('kategori_id', $kategori_id)->get();
        } else {
            // Default: tampilkan rekomendasi (ambil 5 data pertama)
            $wisata = Wisata::all();
        }

        return view('wisata.index', compact('kategori', 'wisata', 'kategori_id'));
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('wisata.show', compact('wisata'));
    }
}

