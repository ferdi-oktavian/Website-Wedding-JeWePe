@extends('layouts.public')
@php($title = 'Beranda')

@section('hero')
<section class="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h1 class="display-4 fw-bold text-primary">Wedding Organizer JeWePe</h1>
        <p class="lead text-muted mb-4">
          Wujudkan pernikahan impian Anda bersama tim profesional kami. Konsep personal, eksekusi elegan.
        </p>
        <a href="{{ route('catalogues.index') }}" class="btn btn-primary">
          Lihat Katalog Paket
        </a>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
{{-- jika mau tambahkan paragraf promosi tambahan di sini --}}
@endsection
