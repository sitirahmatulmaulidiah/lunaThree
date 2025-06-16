@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative h-[60vh] md:h-[80vh] bg-cover bg-center" style="background-image: url('{{ asset('images/menaraPandang.png') }}');">
    {{-- Lapisan ini memberikan warna hitam transparan (20% opacity) di seluruh gambar untuk membuatnya sedikit pudar --}}
    <div class="absolute inset-0 bg-black/30"></div>

    {{-- Gradient overlay untuk membuat teks di bagian bawah lebih terbaca --}}
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

    <div class="relative container mx-auto px-6 h-full flex flex-col items-center justify-center text-center text-white">
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">Temukan Pesona Kalimantan Selatan</h1>
        <p class="text-lg md:text-xl max-w-3xl mb-8">Jelajahi keindahan alam, budaya, dan kuliner khas yang tak terlupakan.</p>
        <a href="{{ route('wisata.index') }}" class="px-8 py-3 bg-cyan-500 text-white font-bold rounded-full hover:bg-cyan-600 transition-transform duration-300 hover:scale-105 shadow-lg">
            Jelajahi Sekarang
        </a>
    </div>
</div>

<!-- Destinasi Wisata Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-4 relative inline-block after:content-[''] after:block after:w-30 after:h-1 after:bg-cyan-500 after:mx-auto after:mt-2 animate-fade-in-down">
            🌄 Destinasi Wisata Terbaru
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($wisatas as $wisata)
            {{-- Card dengan efek hover --}}
            <a href="{{ route('wisata.show', $wisata->id) }}" class="group block bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
                <div class="relative">
                    <img class="h-56 w-full object-cover transition-transform duration-300 group-hover:scale-105" src="{{ asset('storage/' . $wisata->gambar) }}" alt="Gambar {{ $wisata->nama_wisata }}">
                    @if($wisata->kategori)
                    <span class="absolute top-3 left-3 bg-cyan-500 text-white text-xs font-semibold px-2 py-1 rounded-full">{{ $wisata->kategori->nama }}</span>
                    @endif
                    <div class="absolute inset-0 bg-black/10"></div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-cyan-600 transition-colors">{{ $wisata->nama_wisata }}</h3>
                    <p class="text-gray-600 text-sm">{{ Str::limit($wisata->deskripsi, 100) }}</p>
                </div>
            </a>
            @empty
            <p class="text-center col-span-3 text-gray-500">Belum ada data wisata yang tersedia.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Event Section -->
<div class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-4 relative inline-block after:content-[''] after:block after:w-30 after:h-1 after:bg-cyan-500 after:mx-auto after:mt-2 animate-fade-in-down">
            🎉 Event Terbaru
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($events as $event)
            <a href="{{ route('event.show', $event->id) }}" class="group block bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
                <div class="relative">
                    <img class="h-56 w-full object-cover transition-transform duration-300 group-hover:scale-105" src="{{ asset('storage/' . $event->gambar) }}" alt="Gambar {{ $event->nama_event }}">
                    <div class="absolute inset-0 bg-black/10"></div>
                </div>
                <div class="p-6">
                    <p class="text-gray-500 text-xs font-semibold mb-1 uppercase tracking-wider">{{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('D MMMM YYYY') }}</p>
                    <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-cyan-600 transition-colors">{{ $event->nama_event }}</h3>
                    <p class="text-gray-600 text-sm">{{ Str::limit($event->deskripsi, 100) }}</p>
                </div>
            </a>
            @empty
            <p class="text-center col-span-3 text-gray-500">Belum ada event yang akan datang.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection