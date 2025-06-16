@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Form Tambah Event Baru</h1>
        <form action="{{ route('event.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="nama_event" class="block text-sm font-medium text-gray-700">Nama Event</label>
                    <input type="text" name="nama_event" id="nama_event" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                 <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                 <div>
                    <label for="tempat_lokasi" class="block text-sm font-medium text-gray-700">Tempat / Lokasi</label>
                    <input type="text" name="tempat_lokasi" id="tempat_lokasi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                 <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700">
                        Ajukan Event
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection