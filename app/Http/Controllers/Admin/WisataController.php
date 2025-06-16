<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wisata;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::latest()->paginate(10);
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('admin.wisata.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'jam_buka' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('wisata', 'public');
            $data['gambar'] = $path;
        }

        Wisata::create($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil ditambahkan.');
    }

    /**
     * PERUBAHAN DI SINI: Mengubah nama variabel dari $wisata menjadi $wisatum
     * agar cocok dengan parameter rute {wisatum}.
     */
    public function edit(Wisata $wisatum)
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('admin.wisata.edit', ['wisata' => $wisatum, 'kategoris' => $kategoris]);
    }

    /**
     * PERUBAHAN DI SINI: Mengubah nama variabel dari $wisata menjadi $wisatum
     * agar cocok dengan parameter rute {wisatum}.
     */
    public function update(Request $request, Wisata $wisatum)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'jam_buka' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            // Gunakan $wisatum untuk mengakses gambar lama
            if ($wisatum->gambar) {
                Storage::disk('public')->delete($wisatum->gambar);
            }
            $path = $request->file('gambar')->store('wisata', 'public');
            $data['gambar'] = $path;
        }

        // Gunakan $wisatum untuk melakukan update
        $wisatum->update($data);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil diperbarui.');
    }

    public function destroy(Wisata $wisatum)
    {
        if ($wisatum->gambar) {
            Storage::disk('public')->delete($wisatum->gambar);
        }
        $wisatum->delete();
        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil dihapus.');
    }
}
