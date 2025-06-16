@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-gray-500 text-sm font-medium">Total Pengguna</h3>
        <p class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</p>
    </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-gray-500 text-sm font-medium">Total Wisata</h3>
        <p class="text-3xl font-bold text-gray-800">{{ $totalWisata }}</p>
    </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-gray-500 text-sm font-medium">Total Event</h3>
        <p class="text-3xl font-bold text-gray-800">{{ $totalEvents }}</p>
    </div>
     <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-gray-500 text-sm font-medium">Event Menunggu Persetujuan</h3>
        <p class="text-3xl font-bold text-yellow-500">{{ $pendingEvents }}</p>
    </div>
</div>
@endsection
