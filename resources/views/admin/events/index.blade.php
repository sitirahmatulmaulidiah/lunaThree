@extends('layouts.app')

@section('content')
<h2 style="text-align: center; color: #00796b; margin-bottom: 20px;">Event Menunggu Persetujuan</h2>

@foreach($events as $event)
    <div style="background: #f1f8e9; border: 1px solid #c5e1a5; border-radius: 8px; padding: 15px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h4 style="margin: 0 0 10px; color: #33691e;">{{ $event->name }}</h4>
        <p style="margin: 0 0 10px; font-size: 14px; color: #555;">{{ $event->description }}</p>

        <form action="{{ route('events.approve', $event->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" style="background-color: #4caf50; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;">
                ✅ Setujui
            </button>
        </form>

        <form action="{{ route('events.reject', $event->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" style="background-color: #f44336; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">
                ❌ Tolak
            </button>
        </form>
    </div>
@endforeach
@endsection
