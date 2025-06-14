@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 1200px; margin: auto;">

    <!-- Tombol tambah event (seperti navbar action button) -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="
            font-size: 28px;
            color: #00bfa6;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            margin: 0;">
            📅 Event Terkini
        </h1>

        <a href="{{ route('events.create') }}" style="
            background: linear-gradient(45deg, #00bfa6, #1de9b6);
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.2s, box-shadow 0.2s;">
            ➕ Tambah Event
        </a>
    </div>

    <!-- Peta event -->
    <div style="
        margin: 30px 0;
        border: 2px dashed #00bfa6;
        text-align: center;
        padding: 50px 20px;
        background-image: url('/images/map-placeholder.png');
        background-size: cover;
        background-position: center;
        color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        
        <h2 style="
            background: rgba(0, 191, 166, 0.8);
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
            Peta Event Terdekat Dari User
        </h2>
    </div>

    <!-- Kartu event -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        @foreach($featured_events as $event)
            <div style="
                width: 260px;
                border: 1px solid #ddd;
                border-radius: 12px;
                overflow: hidden;
                background: #ffffff;
                box-shadow: 0 4px 8px rgba(0,0,0,0.05);
                transition: transform 0.2s;">
                
                <a href="{{ route('events.show', $event->id) }}" style="text-decoration: none; color: inherit; display: block;">
                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" style="
                        width: 100%;
                        height: 160px;
                        object-fit: cover;">
                    <div style="padding: 12px;">
                        <h4 style="margin: 0 0 8px; font-size: 18px; color: #00bfa6;">{{ $event->name }}</h4>
                        <p style="margin: 0; font-size: 14px; color: #555;">{{ Str::limit($event->description, 60) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
