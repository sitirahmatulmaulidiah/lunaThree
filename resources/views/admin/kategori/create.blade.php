@extends('layouts.admin')
@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Kategori Baru</h1>
<div class="bg-white p-8 rounded-lg shadow-md">
    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf
        @include('admin.kategori._form', ['buttonText' => 'Simpan'])
    </form>
</div>
@endsection