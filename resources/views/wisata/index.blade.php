@extends('layouts.app')

@section('content')
{{-- Sertakan aset Leaflet.js --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<div class="container mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Peta & Daftar Wisata</h1>
        <p class="text-lg text-gray-500 mt-2">Jelajahi semua destinasi wisata di Kalimantan Selatan</p>
    </div>

    <div class="text-center mb-12">
        <h2 class="text-2xl font-bold text-gray-700">Filter Berdasarkan Kategori</h2>
        @if($kategoriAktif)
            <p class="text-md text-gray-600 mt-1">Anda sedang melihat: <span class="font-semibold text-cyan-600">{{ $kategoriAktif->nama }}</span></p>
        @endif
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-2 md:gap-4 mb-12">
        <a href="{{ route('wisata.index') }}" 
           class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300
                  {{ !$kategoriAktif ? 'bg-cyan-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border' }}">
            Semua Kategori
        </a>
        @foreach ($kategoris as $kategori)
            <a href="{{ route('wisata.index', ['kategori' => $kategori->slug]) }}"
               class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300
                      {{ $kategoriAktif && $kategoriAktif->id == $kategori->id ? 'bg-cyan-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border' }}">
                {{ $kategori->nama }}
            </a>
        @endforeach
    </div>

    
    <!-- Daftar Wisata (Grid) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($wisatas as $wisata)
            <a href="{{ route('wisata.show', $wisata->id) }}" class="group block bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
                <div class="relative">
                    <img class="h-56 w-full object-cover transition-transform duration-300 group-hover:scale-105" src="{{ $wisata->gambar ? asset('storage/' . $wisata->gambar) : 'https://placehold.co/600x400/80d0c7/FFFFFF?text=Wisata' }}" alt="Gambar {{ $wisata->nama_wisata }}">
                    @if($wisata->kategori)
                        <span class="absolute top-3 left-3 bg-cyan-500 text-white text-xs font-semibold px-2 py-1 rounded-full">{{ $wisata->kategori->nama }}</span>
                    @endif
                    <div class="absolute inset-0 bg-black/10"></div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-cyan-600 transition-colors">{{ $wisata->nama_wisata }}</h3>
                    <p class="text-gray-600 text-sm">{{ Str::limit($wisata->deskripsi, 100) }}</p>
                </div>
            </a>
        @empty
            <p class="text-center col-span-3 text-gray-500 py-16">
                <span class="text-lg block">Wisata tidak ditemukan</span>
                <span class="text-sm block mt-2">Tidak ada data wisata yang cocok dengan kriteria filter Anda.</span>
            </p>
        @endforelse
    </div>

    
    
    <!-- Pagination -->
    <div class="mt-12">
        {{ $wisatas->links() }}
    </div>
    <!-- PETA RANGKUMAN (Seluruh wisata yang ada) -->
    {{-- Kita tetap menggunakan @if untuk memastikan tidak ada error jika $lokasiWisata kosong --}}
    @if(isset($lokasiWisata) && $lokasiWisata->count() > 0)
        <div class="mb-16">
            <div id="map-overview" style="height: 500px;" class="rounded-lg shadow-xl z-0"></div>
        </div>
    @endif
    
</div>


@if(isset($lokasiWisata) && $lokasiWisata->count() > 0)
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Center peta di tengah Kalimantan Selatan
        const map = L.map('map-overview').setView([-2.9, 115.4], 7);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        const locations = @json($lokasiWisata);
        const markers = [];

        locations.forEach(function(loc) {
            if(loc.latitude && loc.longitude) {
                const marker = L.marker([loc.latitude, loc.longitude]);
                const popupContent = `
                    <div class="font-sans">
                        <h3 class="font-bold text-base mb-1">${loc.nama_wisata}</h3>
                        <a href="/wisata/${loc.id}" class="text-cyan-600 hover:underline text-sm font-semibold">Lihat Detail &rarr;</a>
                    </div>
                `;
                marker.bindPopup(popupContent);
                marker.addTo(map);
                markers.push(marker);
            }
        });

        // Fitur auto-zoom agar semua marker terlihat di peta
        if (markers.length > 0) {
            const group = new L.featureGroup(markers);
            map.fitBounds(group.getBounds().pad(0.3)); // pad(0.3) memberi sedikit margin
        }
    });
</script>
@endif
@endsection
