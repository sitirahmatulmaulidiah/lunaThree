@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Daftar Tempat Wisata</h1>
        {{-- Tampilkan nama kategori jika sedang difilter --}}
        @if($kategoriAktif)
            <p class="text-xl text-gray-600 mt-2">Kategori: <span class="font-semibold">{{ $kategoriAktif->nama }}</span></p>
        @endif
    </div>
    
    <!-- === BAGIAN FILTER KATEGORI BARU === -->
    <div class="flex flex-wrap justify-center gap-2 md:gap-4 mb-12">
        {{-- Tombol untuk menampilkan semua kategori --}}
        <a href="{{ route('wisata.index') }}" 
           class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300
                  {{ !$kategoriAktif ? 'bg-cyan-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border' }}">
            Semua Kategori
        </a>

        {{-- Loop untuk setiap kategori dari database --}}
        @foreach ($kategoris as $kategori)
            <a href="{{ route('wisata.index', ['kategori' => $kategori->slug]) }}"
               class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300
                      {{ $kategoriAktif && $kategoriAktif->id == $kategori->id ? 'bg-cyan-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border' }}">
                {{ $kategori->nama }}
            </a>
        @endforeach
    </div>
    <!-- ===================================== -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($wisatas as $wisata)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <a href="{{ route('wisata.show', $wisata->id) }}">
                    <div class="relative">
                        <img class="h-56 w-full object-cover" src="{{ asset('storage/' . $wisata->gambar) }}" alt="Gambar {{ $wisata->nama_wisata }}">
                        {{-- Tampilkan label kategori di pojok gambar --}}
                        @if($wisata->kategori)
                            <span class="absolute top-2 left-2 bg-cyan-500 text-white text-xs font-semibold px-2 py-1 rounded-full">{{ $wisata->kategori->nama }}</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-gray-800">{{ $wisata->nama_wisata }}</h3>
                        <p class="text-gray-600 text-base">{{ Str::limit($wisata->deskripsi, 100) }}</p>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-center col-span-3 text-gray-500 py-16">
                <span class="text-lg block">Wisata tidak ditemukan</span>
                <span class="text-sm block mt-2">Tidak ada data wisata yang cocok dengan kriteria filter Anda.</span>
            </p>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-12">
        {{ $wisatas->links() }}
    </div>
</div>
@endsection
