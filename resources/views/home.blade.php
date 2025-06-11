@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <a href="{{ route('events.create') }}" style="background-color: #80ded9; padding: 10px 15px; border-radius: 5px; text-decoration: none; color: black;">
        ➕ Tambah event
    </a>

    <div style="margin: 20px 0; border: 2px dashed black; text-align: center; padding: 30px; background-image: url('/images/map-placeholder.png'); background-size: cover; color: black;">
        <h2>Peta event terdekat dari user</h2>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($featured_events as $event)
            <div style="width: 250px; border: 1px solid #ccc; border-radius: 10px; overflow: hidden; background: #e8f7ff;">
                <a href="{{ route('events.show', $event->id) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" style="width: 100%; height: 160px; object-fit: cover;">
                    <div style="padding: 10px;">
                        <h4 style="margin: 0 0 10px;">{{ $event->name }}</h4>
                        <p style="margin: 0; font-size: 14px;">{{ Str::limit($event->description, 60) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
