<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('wisatas')->latest()->paginate(10);
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255|unique:kategoris']);
        Kategori::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate(['nama' => 'required|string|max:255|unique:kategoris,nama,' . $kategori->id]);
        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        // Pastikan tidak ada wisata yang menggunakan kategori ini sebelum menghapus
        if ($kategori->wisatas()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus kategori karena masih digunakan oleh beberapa data wisata.');
        }
        $kategori->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
