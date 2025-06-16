@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden">
        <img class="h-96 w-full object-cover" src="{{ $event->gambar ?? 'https://placehold.co/1200x400/a0c4ff/FFFFFF?text=Suasana+' . $event->nama_event }}" alt="Gambar {{ $event->nama_event }}">
        
        <div class="p-8 md:p-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $event->nama_event }}</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 text-gray-600">
                <div>
                    <strong class="block text-gray-800">Tanggal Pelaksanaan:</strong>
                    <span>{{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }}</span>
                </div>
                <div>
                    <strong class="block text-gray-800">Tempat / Lokasi:</strong>
                    <span>{{ $event->tempat_lokasi }}</span>
                </div>
            </div>
            
            <div class="prose max-w-none text-gray-700">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi Event</h2>
                <p>{{ $event->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
