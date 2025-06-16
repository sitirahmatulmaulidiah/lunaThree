@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<div class="container mx-auto px-6 py-12">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden">
        
        <!-- Header Halaman -->
        <div class="relative">
             <img class="h-64 md:h-96 w-full object-cover" src="{{ asset('storage/' . $wisata->gambar) }}" alt="Gambar {{ $wisata->nama_wisata }}">
             <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
             <div class="absolute bottom-0 left-0 p-8 md:p-12 text-white">
                @if ($wisata->kategori)
                    <a href="{{ route('wisata.index', ['kategori' => $wisata->kategori->slug]) }}" class="inline-block bg-cyan-500 text-white text-sm font-semibold mb-2 px-3 py-1 rounded-full hover:bg-cyan-600 transition-colors">
                        {{ $wisata->kategori->nama }}
                    </a>
                @endif
                <h1 class="text-4xl md:text-5xl font-bold leading-tight shadow-text">{{ $wisata->nama_wisata }}</h1>
             </div>
        </div>
        
        <div class="p-8 md:p-12">
            
            <!-- Info Penting dengan Ikon -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12 border-b pb-8">
                <div class="flex items-center gap-4">
                    <div class="bg-cyan-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Harga Tiket</p>
                        <p class="font-bold text-gray-800">Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
                    </div>
                </div>
                 <div class="flex items-center gap-4">
                    <div class="bg-cyan-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jam Buka</p>
                        <p class="font-bold text-gray-800">{{ $wisata->jam_buka ?? 'N/A' }}</p>
                    </div>
                </div>
                 <div class="flex items-center gap-4">
                    <div class="bg-cyan-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Lokasi</p>
                        <p class="font-bold text-gray-800">{{ $wisata->lokasi ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Deskripsi & Fasilitas -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2 prose max-w-none text-gray-700">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi</h2>
                    <p>{{ $wisata->deskripsi }}</p>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Fasilitas</h2>
                    <p>{{ $wisata->fasilitas ?? 'Informasi fasilitas tidak tersedia.' }}</p>
                </div>
                <!-- Peta Lokasi -->
                <div class="lg:col-span-1">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Peta Lokasi</h2>
                     @if($wisata->latitude && $wisata->longitude)
                        <div id="map-display" style="height: 300px;" class="rounded-lg shadow-sm z-0"></div>
                        <script>
                            const lat = {{ $wisata->latitude }};
                            const lng = {{ $wisata->longitude }};
                            const map = L.map('map-display').setView([lat, lng], 15);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                            L.marker([lat, lng]).addTo(map).bindPopup("{{ $wisata->nama_wisata }}").openPopup();
                        </script>
                    @else
                        <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg text-gray-500">Peta tidak tersedia.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
