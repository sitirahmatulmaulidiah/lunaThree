@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Wisata Baru</h1>
<div class="bg-white p-8 rounded-lg shadow-md">
    <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.wisata._form', ['buttonText' => 'Simpan Wisata'])
    </form>
</div>
@endsection