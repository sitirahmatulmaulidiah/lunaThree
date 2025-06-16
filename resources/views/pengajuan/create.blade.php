@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Form Pengajuan Event Baru</h1>
        
        {{-- PENTING: Tambahkan enctype="multipart/form-data" agar form bisa upload file --}}
        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
            <style>
                .loader { border: 4px solid #f3f3f3; border-radius: 50%; border-top: 4px solid #0891b2; width: 20px; height: 20px; animation: spin 1s linear infinite; }
                @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
            </style>

            <div class="space-y-6">
                <div>
                    <label for="nama_event" class="block text-sm font-medium text-gray-700">Nama Event</label>
                    <input type="text" name="nama_event" id="nama_event" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('nama_event') }}" required>
                </div>

                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Event (Poster/Banner)</label>
                    <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
                </div>

                <!-- INFORMASI DALAM SATU BARIS -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('tanggal') }}" required>
                    </div>
                     <div>
                        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu (Opsional)</label>
                        <input type="text" name="waktu" id="waktu" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="{{ old('waktu') }}" placeholder="Contoh: 19:00 - Selesai">
                    </div>
                </div>

                <div>
                    <label for="tempat_lokasi" class="block text-sm font-medium text-gray-700">Lokasi Tertulis (Nama Gedung/Alamat)</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="tempat_lokasi" id="lokasi" class="flex-1 block w-full rounded-none rounded-l-md border-gray-300" value="{{ old('tempat_lokasi') }}" placeholder="Contoh: Gedung Sultan Suriansyah, Banjarmasin" required>
                        <button type="button" id="search-location-btn" class="inline-flex items-center px-4 py-2 border border-l-0 border-gray-300 bg-gray-50 text-gray-700 rounded-r-md hover:bg-gray-100">
                            <span id="search-text">Cari</span>
                            <div id="search-loader" class="loader hidden"></div>
                        </button>
                    </div>
                    <p id="search-error" class="text-red-500 text-sm mt-1 hidden">Lokasi tidak ditemukan.</p>
                </div>
        
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Titik Lokasi di Peta</label>
                    <div id="map" style="height: 400px;" class="rounded-lg shadow-sm z-0"></div>
                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Event</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700">
                        Ajukan Event
                    </button>
                </div>
            </div>
            
            <script>
                // Script Peta Interaktif
                const defaultLat = -3.3176;
                const defaultLng = 114.5901;
                const map = L.map('map').setView([defaultLat, defaultLng], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap contributors' }).addTo(map);
                let marker = null;
                function updateMarkerAndInputs(lat, lng) {
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                    if (marker) { marker.setLatLng([lat, lng]); } else { marker = L.marker([lat, lng]).addTo(map); }
                    map.setView([lat, lng], 16);
                }
                map.on('click', function(e) { updateMarkerAndInputs(e.latlng.lat, e.latlng.lng); });
                const searchBtn = document.getElementById('search-location-btn');
                const searchInput = document.getElementById('lokasi');
                const searchText = document.getElementById('search-text');
                const searchLoader = document.getElementById('search-loader');
                const searchError = document.getElementById('search-error');
                searchBtn.addEventListener('click', function() {
                    const query = searchInput.value;
                    if (!query) return;
                    searchText.classList.add('hidden');
                    searchLoader.classList.remove('hidden');
                    searchError.classList.add('hidden');
                    searchBtn.disabled = true;
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&countrycodes=id&viewbox=114.0, -4.5, 117.0, -1.0&bounded=1`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                const lat = parseFloat(data[0].lat);
                                const lon = parseFloat(data[0].lon);
                                updateMarkerAndInputs(lat, lon);
                            } else { searchError.classList.remove('hidden'); }
                        })
                        .finally(() => {
                            searchText.classList.remove('hidden');
                            searchLoader.classList.add('hidden');
                            searchBtn.disabled = false;
                        });
                });
            </script>
        </form>
    </div>
</div>
@endsection
