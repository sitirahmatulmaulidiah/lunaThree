@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <!-- Profile Header/Banner -->
    <div class="relative h-48 md:h-56 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-background.jpg') }}');">
        <div class="absolute inset-0 bg-black/30"></div>
    </div>

    <div class="container mx-auto px-6 pb-12">
        <!-- Main Profile Card -->
        <div class="relative bg-white p-8 rounded-lg shadow-lg -mt-24">
            <div class="flex flex-col md:flex-row md:items-center">
                
                <!-- Avatar -->
                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-8">
                    <img class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white shadow-md object-cover" 
                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0891b2&color=fff&size=160&font-size=0.33" 
                         alt="Avatar {{ Auth::user()->name }}">
                </div>

                <!-- User Info -->
                <div class="flex-grow">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ Auth::user()->name }}</h1>
                    <p class="text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                    
                    <div class="mt-4 flex flex-wrap items-center gap-4">
                        <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full
                            @if(Auth::user()->role == 'admin')
                                bg-cyan-100 text-cyan-800
                            @else
                                bg-green-100 text-green-800
                            @endif
                        ">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 @if(Auth::user()->role == 'admin') text-cyan-500 @else text-green-500 @endif" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                            {{ ucfirst(Auth::user()->role) }}
                        </span>

                        <span class="inline-flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Bergabung sejak {{ Auth::user()->created_at->isoFormat('D MMMM Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Profile Actions / Activity -->
            <div class="mt-8 border-t pt-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Saya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('profile.myEvents') }}" class="group flex items-center p-6 bg-gray-50 rounded-lg hover:bg-cyan-50 transition-colors duration-300">
                        <div class="mr-4">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-cyan-100 text-cyan-600 group-hover:bg-cyan-500 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Event yang Saya Ajukan</p>
                            <p class="text-sm text-gray-500">Lihat riwayat dan status pengajuan event Anda.</p>
                        </div>
                        <div class="ml-auto text-gray-400 group-hover:text-cyan-600 transition-colors duration-300">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </a>

                    {{-- Anda bisa menambahkan kartu aksi lain di sini di masa depan --}}
                    {{-- <a href="#" class="group flex items-center p-6 bg-gray-50 rounded-lg hover:bg-green-50 ..."> --}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
