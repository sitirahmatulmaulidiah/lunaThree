@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<div class="bg-white">
    <!-- Header Halaman dengan Gambar -->
    <div class="relative">
         <img class="h-64 md:h-96 w-full object-cover" src="{{ $wisata->gambar ? asset('storage/' . $wisata->gambar) : 'https://placehold.co/1200x400/1f2937/FFFFFF?text=Wisata' }}" alt="Gambar {{ $wisata->nama_wisata }}">
         <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
         <div class="absolute bottom-0 left-0 p-8 md:p-12 text-white">
            @if ($wisata->kategori)
                <a href="{{ route('wisata.index', ['kategori' => $wisata->kategori->slug]) }}" class="inline-block bg-cyan-500 text-white text-sm font-semibold mb-2 px-3 py-1 rounded-full hover:bg-cyan-600 transition-colors">
                    {{ $wisata->kategori->nama }}
                </a>
            @endif
            <h1 class="text-4xl md:text-5xl font-bold leading-tight drop-shadow-lg">{{ $wisata->nama_wisata }}</h1>
         </div>
    </div>
    
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            
            <!-- === PERUBAHAN UTAMA DI SINI: TATA LETAK KARTU INFO === -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 -mt-10 relative z-10">
                
                {{-- Kartu 1: Harga Tiket --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                    <div class="flex items-center justify-center h-16 w-16 bg-cyan-100 rounded-full mb-3">
                        <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </div>
                    <p class="text-sm text-gray-500">Harga Tiket</p>
                    <p class="text-lg font-semibold text-gray-800">Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</p>
                </div>
                
                {{-- Kartu 2: Jam Buka --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                    <div class="flex items-center justify-center h-16 w-16 bg-cyan-100 rounded-full mb-3">
                        <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-sm text-gray-500">Jam Buka</p>
                    <p class="text-lg font-semibold text-gray-800">{{ $wisata->jam_buka ?? 'N/A' }}</p>
                </div>

                {{-- Kartu 3: Hari Buka --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                    <div class="flex items-center justify-center h-16 w-16 bg-cyan-100 rounded-full mb-3">
                        <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-sm text-gray-500">Hari Buka</p>
                    <p class="text-base font-semibold text-gray-800 leading-tight">
                        {!! $wisata->hari_buka ? implode(', ', $wisata->hari_buka) : '<span class="font-normal text-gray-600">Informasi tidak tersedia</span>' !!}
                    </p>
                </div>
                
                {{-- Kartu 4: Lokasi --}}
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                    <div class="flex items-center justify-center h-16 w-16 bg-cyan-100 rounded-full mb-3">
                        <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <p class="text-sm text-gray-500">Lokasi</p>
                    <p class="text-base font-semibold text-gray-800 leading-tight">{{ $wisata->lokasi ?? 'N/A' }}</p>
                </div>
            </div>
            <!-- ======================================================== -->


            <!-- Deskripsi & Fasilitas & Peta -->
            <div class="py-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-2 prose max-w-none text-gray-700">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi</h2>
                        <p>{{ $wisata->deskripsi }}</p>
                        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-4">Fasilitas</h2>
                        <p>{{ $wisata->fasilitas ?? 'Informasi fasilitas tidak tersedia.' }}</p>
                    </div>
                    <div class="lg:col-span-1">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Peta Lokasi</h2>
                         @if($wisata->latitude && $wisata->longitude)
                            <div id="map-display" style="height: 300px;" class="rounded-lg shadow-md z-0"></div>
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
</div>
@endsection
