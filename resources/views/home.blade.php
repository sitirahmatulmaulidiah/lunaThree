@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 1200px; margin: auto;">

    <!-- Tombol tambah event (seperti navbar action button) -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="
            font-size: 28px;
            color: #00bfa6;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            margin: 0;">
            📅 Event Terkini
        </h1>

        <a href="{{ route('events.create') }}" style="
            background: linear-gradient(45deg, #00bfa6, #1de9b6);
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.2s, box-shadow 0.2s;">
            ➕ Tambah Event
        </a>
    </div>

     <!-- Peta event -->
    <div id="map" style="width: 100%; height: 500px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 50px;"></div>


    <!-- Kartu event -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        @foreach($featured_events as $event)
            <div style="
                width: 260px;
                border: 1px solid #ddd;
                border-radius: 12px;
                overflow: hidden;
                background: #ffffff;
                box-shadow: 0 4px 8px rgba(0,0,0,0.05);
                transition: transform 0.2s;">
                
                <a href="{{ route('events.show', $event->id) }}" style="text-decoration: none; color: inherit; display: block;">
                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" style="
                        width: 100%;
                        height: 160px;
                        object-fit: cover;">
                    <div style="padding: 12px;">
                        <h4 style="margin: 0 0 8px; font-size: 18px; color: #00bfa6;">{{ $event->name }}</h4>
                        <p style="margin: 0; font-size: 14px; color: #555;">{{ Str::limit($event->description, 60) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@section('scripts')
<!-- Leaflet CSS + JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (!navigator.geolocation) {
        alert("Browser Anda tidak mendukung Geolocation");
        return;
    }

    navigator.geolocation.getCurrentPosition(function(position) {
        const userLat = position.coords.latitude;
        const userLng = position.coords.longitude;

        var map = L.map('map').setView([userLat, userLng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([userLat, userLng]).addTo(map)
            .bindPopup("<strong>Lokasi Anda</strong>")
            .openPopup();

        const events = @json($featured_events);

        let nearestDistance = Infinity;
        let nearestEventLatLng = null;
        let nearestEventMarker = null; // 👉 kita tambahkan ini

        events.forEach(event => {
            if (event.latitude && event.longitude) {
                const distance = map.distance([userLat, userLng], [event.latitude, event.longitude]);

                const marker = L.marker([event.latitude, event.longitude]).addTo(map)
                    .bindPopup(`<strong>${event.name}</strong><br>${event.location}<br>Jarak: ${(distance/1000).toFixed(2)} km`);

                if (distance < nearestDistance) {
                    nearestDistance = distance;
                    nearestEventLatLng = [event.latitude, event.longitude];
                    nearestEventMarker = marker; // 👉 kita simpan marker terdekat
                }
            }
        });

        if (nearestEventLatLng) {
            // Buat rute
            L.Routing.control({
                waypoints: [
                    L.latLng(userLat, userLng),
                    L.latLng(nearestEventLatLng[0], nearestEventLatLng[1])
                ],
                routeWhileDragging: false,
                show: false,
                addWaypoints: false
            }).addTo(map);

            // 👉 Buka popup marker terdekat
            nearestEventMarker.openPopup();
        }

    }, function(error) {
        alert("Gagal mendapatkan lokasi Anda: " + error.message);
    });
});
</script>

@endsection


@endsection
