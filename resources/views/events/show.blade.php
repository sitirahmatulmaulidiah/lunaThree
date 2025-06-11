@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <div style="display: flex; gap: 15px;">
        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" style="width: 100%; max-width: 300px; border-radius: 10px; object-fit: cover;">
    </div>

    <div style="background-color: #80ded9; padding: 20px; margin-top: 20px; border-radius: 10px;">
        <h2>{{ $event->name }}</h2>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
        <p><strong>Tempat/Lokasi:</strong> {{ $event->location }}</p>
        <p><strong>Deskripsi:</strong> {{ $event->description }}</p>
    </div>

    <div style="margin-top: 20px; border: 2px dashed black; text-align: center; padding: 30px; background-image: url('/images/map-placeholder.png'); background-size: cover;">
        <h2>Peta event</h2>
    </div>
</div>
@endsection
