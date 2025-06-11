@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Wisata</h2>

    {{-- Tombol kategori --}}
    <div class="btn-group mb-3">
        @foreach($kategori as $kat)
            <a href="{{ route('wisata.index', ['kategori' => $kat->id]) }}" class="btn btn-primary {{ $kategori_id == $kat->id ? 'active' : '' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
        <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Semua</a>
    </div>

    {{-- Peta Interaktif --}}
    <div id="map" style="height: 400px; margin-bottom: 20px;"></div>

    {{-- Daftar Wisata --}}
    <div class="row">
        @foreach($wisata as $w)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'.$w->foto) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $w->nama_wisata }}</h5>
                    <p class="card-text">{{ Str::limit($w->deskripsi, 100) }}</p>
                    <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-sm btn-info">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    var map = L.map('map').setView([-7.250445, 112.768845], 13); // default Surabaya

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    @foreach($wisata as $w)
        @if($w->latitude && $w->longitude)
            L.marker([{{ $w->latitude }}, {{ $w->longitude }}])
            .addTo(map)
            .bindPopup("<b>{{ $w->nama_wisata }}</b>");
        @endif
    @endforeach
</script>
@endpush
