@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $wisata->nama_wisata }}</h2>
    <img src="{{ asset('storage/'.$wisata->foto) }}" class="img-fluid mb-3">
    <p>{{ $wisata->deskripsi }}</p>

    <div id="map" style="height: 400px;"></div>
</div>
@endsection

@push('scripts')
@if($wisata->latitude && $wisata->longitude)
<script>
    var map = L.map('map').setView([{{ $wisata->latitude }}, {{ $wisata->longitude }}], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}])
        .addTo(map)
        .bindPopup("<b>{{ $wisata->nama_wisata }}</b>").openPopup();
</script>
@else
<script>
    document.getElementById('map').innerHTML = "<div class='alert alert-warning'>Lokasi belum tersedia.</div>";
</script>
@endif
@endpush
