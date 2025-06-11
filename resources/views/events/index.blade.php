@extends('layouts.app')

@section('content')
    {{-- Galeri Event --}}
    <div style="display: flex; justify-content: center; gap: 20px; margin: 20px 0;">
        @for ($i = 0; $i < 4; $i++)
            <div style="width: 160px; height: 160px; background-color: #e3f6fd; border-radius: 10px; overflow: hidden;">
                <img src="{{ asset('images/sample.jpeg') }}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        @endfor
    </div>

    {{-- Informasi Event --}}
    <div style="background-color: #89e6e4; padding: 30px; color: white; border-radius: 10px;">
        <h2>Nama Event</h2>
        <p><strong>Tanggal:</strong> 25 Mei 2025</p>
        <p><strong>Tempat/Lokasi:</strong> Menara Pandang, Jl. Kapten Pierre Tendean No.07, RT.18/RW.2, Gadang, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70213</p>
        <p><strong>Deskripsi:</strong> Berisi deskripsi singkat tentang event tersebut.</p>
    </div>

    {{-- Peta Event --}}
    <div style="margin: 30px 0; text-align: center;">
        <h3>Peta event</h3>
        <div style="width: 100%; max-width: 800px; height: 300px; margin: 0 auto; border: 2px dashed #aaa; border-radius: 10px; overflow: hidden;">
            <img src="{{ asset('images/sample-map.jpg') }}" alt="Peta Event" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>

    {{-- Footer --}}
    <footer style="text-align: center; background-color: #f1f1f1; padding: 15px; border-top: 1px solid #ccc;">
        <p>Footer</p>
    </footer>
@endsection
