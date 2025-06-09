@extends('layouts.app')

@section('content')

<div class="hero">
  <div class="hero-text">
    <h2 class="fw-bold">Selamat Datang</h2>
    <p>Jelajahi keindahan alam, budaya, dan kuliner khas Banjarmasin. Temukan destinasi impianmu dan jadikan perjalananmu tak terlupakan. Kami hadir untuk memudahkan petualangan di Kota Seribu Sungai.</p>
  </div>
</div>

<div class="container py-5">
  <h5 class="text-center fw-bold">Destinasi Wisata</h5>
  <hr class="w-25 mx-auto mb-4">
  <div class="row g-3">
    @for($i = 0; $i < 3; $i++)
    <div class="col-md-4">
      <div class="card">
        <img src="{{ asset('images/menara.jpg') }}" alt="Menara"  class="card-img-top" alt="Wisata">
        <div class="card-body">
          <h5 class="card-title">Nama Wisata</h5>
          <p class="card-text">Deskripsi wisata</p>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

<div class="container pb-5">
  <h5 class="text-center fw-bold">Event</h5>
  <hr class="w-25 mx-auto mb-4">
  <div class="row g-3">
    @for($i = 0; $i < 3; $i++)
    <div class="col-md-4">
      <div class="card">
        <img src="{{ asset('images/menara.jpg') }}" alt="Menara"  class="card-img-top" alt="Event">
        <div class="card-body">
          <h5 class="card-title">Nama Event</h5>
          <p class="card-text">Deskripsi event</p>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

@endsection
