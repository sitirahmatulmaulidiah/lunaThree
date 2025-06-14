@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: auto;">
    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
        <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" 
            style="width: 100%; max-width: 600px; border-radius: 15px; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
    </div>

    <div style="background-color: #e0f7fa; padding: 25px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h2 style="color: #00796b; margin-bottom: 10px;">{{ $event->name }}</h2>
        <p style="margin: 5px 0;"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
        <p style="margin: 5px 0;"><strong>Tempat/Lokasi:</strong> {{ $event->location }}</p>
        <p style="margin: 5px 0;"><strong>Deskripsi:</strong> {{ $event->description }}</p>
    </div>

    <div style="margin-top: 25px;">
        <h2 style="color: #004d40; margin-bottom: 10px;">Peta Event</h2>
        <div id="map" style="width: 100%; height: 400px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);"></div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Leaflet CSS & JS (alternatif gratis Google Maps) -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('map').setView([{{ $event->latitude }}, {{ $event->longitude }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([{{ $event->latitude }}, {{ $event->longitude }}]).addTo(map)
            .bindPopup('<strong>{{ $event->name }}</strong><br>{{ $event->location }}')
            .openPopup();
    });
</script>
@endsection
