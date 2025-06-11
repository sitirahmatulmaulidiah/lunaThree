@extends('layouts.app')

@section('content')
<h2>Tambah Event</h2>
<form method="POST" action="{{ route('events.store') }}">
    @csrf
    <input name="name" placeholder="Nama Event" required>
    <input name="location" placeholder="Lokasi" required>
    <input type="datetime-local" name="date" required>
    <textarea name="description" placeholder="Deskripsi" required></textarea>
    <button type="submit">Kirim</button>
</form>
@endsection
