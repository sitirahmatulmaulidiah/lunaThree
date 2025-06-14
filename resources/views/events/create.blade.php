@extends('layouts.app')

@section('content')
<h2 style="text-align: center; color: #00796b; margin-bottom: 20px;">Tambah Event</h2>

<form method="POST" action="{{ route('events.store') }}" style="max-width: 500px; margin: 0 auto; background: #e0f2f1; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    @csrf

    <input name="name" placeholder="Nama Event" required 
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

    <input name="location" placeholder="Lokasi" required 
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

    <input type="datetime-local" name="date" required 
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

    <textarea name="description" placeholder="Deskripsi" required 
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; min-height: 100px;"></textarea>

    <button type="submit" 
        style="width: 100%; padding: 12px; background-color: #00796b; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background-color 0.3s;">
        Kirim
    </button>
</form>
@endsection
