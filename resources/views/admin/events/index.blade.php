@extends('layouts.app')

@section('content')
<h2>Event Menunggu Persetujuan</h2>
@foreach($events as $event)
    <div>
        <h4>{{ $event->name }}</h4>
        <p>{{ $event->description }}</p>
        <form action="{{ route('events.approve', $event->id) }}" method="POST" style="display:inline">
            @csrf
            @method('PATCH')
            <button type="submit">Setujui</button>
        </form>
        <form action="{{ route('events.reject', $event->id) }}" method="POST" style="display:inline">
            @csrf
            @method('PATCH')
            <button type="submit">Tolak</button>
        </form>
    </div>
@endforeach
@endsection
