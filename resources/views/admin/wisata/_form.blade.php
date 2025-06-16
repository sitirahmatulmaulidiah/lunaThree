<!-- Include Leaflet CSS and JS di bagian <head> layout admin Anda atau langsung di sini -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<!-- CSS untuk pesan loading -->
<style>
    .loader {
        border: 4px solid #f3f3f3;
        border-radius: 50%;
        border-top: 4px solid #0891b2; /* cyan-600 */
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="space-y-6">
    <div>
        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori Wisata</label>
        <select name="kategori_id" id="kategori_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ (isset($wisata) && $wisata->kategori_id == $kategori->id) ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div>
        <label for="nama_wisata" class="block text-sm font-medium text-gray-700">Nama Wisata</label>
        <input type="text" name="nama_wisata" id="nama_wisata" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('nama_wisata', $wisata->nama_wisata ?? '') }}" required>
    </div>

    <div>
        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Wisata</label>
        <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
        @if(isset($wisata) && $wisata->gambar)
            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="Gambar saat ini" class="mt-2 h-32 rounded">
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="harga_tiket" class="block text-sm font-medium text-gray-700">Harga Tiket Masuk</label>
            <input type="number" name="harga_tiket" id="harga_tiket" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('harga_tiket', $wisata->harga_tiket ?? '0') }}" required>
        </div>
        <div>
            <label for="jam_buka" class="block text-sm font-medium text-gray-700">Jam Buka</label>
            <input type="text" name="jam_buka" id="jam_buka" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('jam_buka', $wisata->jam_buka ?? '') }}" placeholder="Contoh: 08:00 - 17:00 WITA">
        </div>
    </div>
    
    <div>
        <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi Tertulis (Alamat)</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text" name="lokasi" id="lokasi" class="flex-1 block w-full rounded-none rounded-l-md border-gray-300" value="{{ old('lokasi', $wisata->lokasi ?? '') }}" placeholder="Contoh: Jembatan Barito, Banjarmasin">
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
        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $wisata->latitude ?? '') }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $wisata->longitude ?? '') }}">
    </div>

    <div>
        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('deskripsi', $wisata->deskripsi ?? '') }}</textarea>
    </div>

    <div>
        <label for="fasilitas" class="block text-sm font-medium text-gray-700">Fasilitas</label>
        <textarea name="fasilitas" id="fasilitas" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Contoh: Toilet, Mushola, Warung Makan">{{ old('fasilitas', $wisata->fasilitas ?? '') }}</textarea>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-cyan-600 text-white px-6 py-2 rounded-lg hover:bg-cyan-700">{{ $buttonText }}</button>
    </div>
</div>

<script>
    // Koordinat default untuk Kalimantan Selatan (Banjarmasin)
    const defaultLat = {{ old('latitude', $wisata->latitude ?? -3.3176) }};
    const defaultLng = {{ old('longitude', $wisata->longitude ?? 114.5901) }};

    const map = L.map('map').setView([defaultLat, defaultLng], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    let marker = null;
    if (document.getElementById('latitude').value && document.getElementById('longitude').value) {
        marker = L.marker([defaultLat, defaultLng]).addTo(map);
    }

    // Fungsi untuk memperbarui marker dan input
    function updateMarkerAndInputs(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng]).addTo(map);
        }
        map.setView([lat, lng], 16); // Zoom lebih dekat ke lokasi
    }

    // Event listener untuk klik di peta
    map.on('click', function(e) {
        updateMarkerAndInputs(e.latlng.lat, e.latlng.lng);
    });

    // === FITUR BARU: PENCARIAN LOKASI ===
    const searchBtn = document.getElementById('search-location-btn');
    const searchInput = document.getElementById('lokasi');
    const searchText = document.getElementById('search-text');
    const searchLoader = document.getElementById('search-loader');
    const searchError = document.getElementById('search-error');

    searchBtn.addEventListener('click', function() {
        const query = searchInput.value;
        if (!query) return;

        // Tampilkan loading, sembunyikan teks dan error
        searchText.classList.add('hidden');
        searchLoader.classList.remove('hidden');
        searchError.classList.add('hidden');
        searchBtn.disabled = true;

        // Panggil API Nominatim
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&countrycodes=id&viewbox=114.0, -4.5, 117.0, -1.0&bounded=1`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);
                    updateMarkerAndInputs(lat, lon);
                } else {
                    searchError.classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                searchError.classList.remove('hidden');
            })
            .finally(() => {
                // Kembalikan tombol ke keadaan normal
                searchText.classList.remove('hidden');
                searchLoader.classList.add('hidden');
                searchBtn.disabled = false;
            });
    });
</script>
