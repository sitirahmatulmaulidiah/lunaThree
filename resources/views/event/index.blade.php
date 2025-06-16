@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 text-center md:text-left">Daftar Event</h1>
        @auth
            <!-- Link diubah ke 'pengajuan.create' yang baru dan unik -->
            <a href="{{ route('pengajuan.create') }}" class="mt-4 md:mt-0 inline-block bg-cyan-500 text-white font-bold px-6 py-3 rounded-lg shadow-md hover:bg-cyan-600 transition-colors">
                + Tambah Event
            </a>
        @endauth
    </div>
    
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

    <div class="mt-12">
        {{ $events->links() }}
    </div>
</div>
@endsection
