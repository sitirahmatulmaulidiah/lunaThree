@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Peta & Daftar Event</h1>
        <p class="text-lg text-gray-500 mt-2">Cari tau event yang ada di Kalimantan Selatan</p>
        @auth
        <a href="{{ route('pengajuan.create') }}" class="mt-4 md:mt-0 inline-block bg-cyan-500 text-white font-bold px-6 py-3 rounded-lg shadow-md hover:bg-cyan-600 transition-colors">
            + Tambah Event
        </a>
        @endauth
    </div>


    <!-- Daftar Event -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($events as $event)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
            <a href="{{ route('event.show', $event->id) }}">
                <img class="h-56 w-full object-cover" src="{{ asset('storage/' . $event->gambar) }}" alt="Gambar {{ $event->nama_event }}">
                <div class="p-6">
                    <p class="text-gray-500 text-sm mb-1">{{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }}</p>
                    <h3 class="font-bold text-xl mb-2 text-gray-800">{{ $event->nama_event }}</h3>
                    <p class="text-gray-600 text-base">{{ Str::limit($event->deskripsi, 100) }}</p>
                </div>
            </a>
        </div>
        @empty
        <p class="text-center col-span-3 text-gray-500">Saat ini belum ada event yang tersedia.</p>
        @endforelse
    </div>
    

    <!-- Pagination -->
    <div class="mt-12">
        {{ $events->links() }}
    </div>

    <!-- Peta Event -->
    <div id="eventMap" class="w-full mb-8 rounded-lg shadow" style="height:400px;"></div>
</div>
@endsection

@section('scripts')
<!-- Leaflet CSS + JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (!navigator.geolocation) {
            alert("Browser Anda tidak mendukung Geolocation");
            return;
        }

        navigator.geolocation.getCurrentPosition(function (position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            var map = L.map('eventMap').setView([userLat, userLng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            L.marker([userLat, userLng]).addTo(map)
                .bindPopup("<strong>Lokasi Anda</strong>")
                .openPopup();

            const events = @json($featured_events);

            let nearestDistance = Infinity;
            let nearestEventLatLng = null;
            let nearestEventMarker = null;

            events.forEach(event => {
                if (event.latitude && event.longitude) {
                    const distance = map.distance([userLat, userLng], [event.latitude, event.longitude]);

                    const popupContent = `
                        <strong>${event.nama_event}</strong><br>
                        ${event.tempat_lokasi}<br>
                        Jarak: ${(distance / 1000).toFixed(2)} km
                    `;

                    const marker = L.marker([event.latitude, event.longitude])
                        .addTo(map)
                        .bindPopup(popupContent);

                    if (distance < nearestDistance) {
                        nearestDistance = distance;
                        nearestEventLatLng = [event.latitude, event.longitude];
                        nearestEventMarker = marker;
                    }
                }
            });

            if (nearestEventLatLng) {
                L.Routing.control({
                    waypoints: [
                        L.latLng(userLat, userLng),
                        L.latLng(nearestEventLatLng[0], nearestEventLatLng[1])
                    ],
                    routeWhileDragging: false,
                    show: false,
                    addWaypoints: false
                }).addTo(map);

                nearestEventMarker.openPopup();
            }

        }, function (error) {
            alert("Gagal mendapatkan lokasi Anda: " + error.message);
        });
    });
</script>
@endsection
