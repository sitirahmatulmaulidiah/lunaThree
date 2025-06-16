@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Wisata</h1>
<div class="bg-white p-8 rounded-lg shadow-md">
    <form action="{{ route('admin.wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.wisata._form', ['buttonText' => 'Update Wisata'])
    </form>
</div>
@endsection