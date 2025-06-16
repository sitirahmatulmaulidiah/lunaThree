@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

{{-- Bagian Latar Belakang dan Poster Utama --}}
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
        
        {{-- Wadah untuk efek "gambar di atas gambar buram" --}}
        <div class="relative w-full max-w-4xl mx-auto flex items-center justify-center p-4 rounded-xl" style="min-height: 50vh;">
            
            <!-- 1. Gambar Latar Belakang (Buram) -->
            <img src="{{ $event->gambar ? asset('storage/' . $event->gambar) : 'https://placehold.co/1200x400/1f2937/FFFFFF?text=Event' }}" 
                 alt="Background" 
                 class="absolute inset-0 w-full h-full object-cover blur-xl scale-110 rounded-xl">
            
            <!-- 2. Lapisan Overlay Gelap -->
            <div class="absolute inset-0 bg-black/40 rounded-xl"></div>
            
            <!-- 3. Gambar Asli (Tajam) di Tengah -->
            <img class="relative z-10 max-h-[80vh] rounded-lg shadow-2xl" 
                 src="{{ $event->gambar ? asset('storage/' . $event->gambar) : 'https://placehold.co/800x1200/FFFFFF/334155?text=Poster+Event' }}" 
                 alt="Poster {{ $event->nama_event }}">
        </div>

    </div>
</div>

{{-- Bagian Detail Konten --}}
<div class="bg-white">
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 text-center">{{ $event->nama_event }}</h1>

            {{-- Info Tanggal, Waktu, Lokasi --}}
            <div class="flex flex-wrap justify-center gap-6 md:gap-12 my-8 text-center border-y py-6">
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-100 p-3 rounded-full mb-2"><svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                    <p class="text-sm text-gray-500">Tanggal</p>
                    <p class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }}</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-100 p-3 rounded-full mb-2"><svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                    <p class="text-sm text-gray-500">Waktu</p>
                    <p class="font-semibold text-gray-800">{{ $event->waktu ?? 'N/A' }}</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-100 p-3 rounded-full mb-2"><svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
                    <p class="text-sm text-gray-500">Lokasi</p>
                    <p class="font-semibold text-gray-800">{{ $event->tempat_lokasi }}</p>
                </div>
            </div>

            {{-- Deskripsi dan Peta --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mt-8">
                <div class="lg:col-span-2 prose max-w-none text-gray-700">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi Event</h2>
                    <p>{{ $event->deskripsi }}</p>
                </div>
                <div class="lg:col-span-1">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Peta Lokasi</h2>
                    @if($event->latitude && $event->longitude)
                        <div id="map-display" style="height: 300px;" class="rounded-lg shadow-md z-0"></div>
                        <script>
                            const lat = {{ $event->latitude }};
                            const lng = {{ $event->longitude }};
                            const map = L.map('map-display').setView([lat, lng], 15);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                            L.marker([lat, lng]).addTo(map).bindPopup("{{ $event->nama_event }}").openPopup();
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
