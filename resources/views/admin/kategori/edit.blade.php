@extends('layouts.admin')
@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Kategori</h1>
<div class="bg-white p-8 rounded-lg shadow-md">
    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.kategori._form', ['buttonText' => 'Update'])
    </form>
</div>
@endsection