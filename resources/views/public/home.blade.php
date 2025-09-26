@php($title = 'Beranda')
@extends('layouts.public')

@section('content')
<section class="hero py-5">
  <div class="container d-flex align-items-center gap-4 flex-column flex-md-row">
    <img src="{{ asset($setting->main_image ?? '') }}" onerror="this.style.display='none'"
         alt="Hero" class="rounded shadow" style="width:360px;max-width:40%">
    <div>
      <h1 class="display-6 fw-bold">Wedding Organizer JeWePe</h1>
      <p class="lead">{{ $setting->intro_text ?? 'Wujudkan pernikahan impian Anda bersama kami.' }}</p>
      <a href="#katalog" class="btn btn-dark btn-lg">Lihat Paket</a>
    </div>
  </div>
</section>

<section id="katalog" class="py-5">
  <div class="container">
    <h2 class="mb-4 fw-bold">Katalog Paket</h2>
    <div class="row g-4">
      @forelse($packages as $p)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card package-card h-100 shadow-sm">
            <img src="{{ asset($p->cover_image ?? '') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Paket';" class="card-img-top" alt="Paket">
            <div class="card-body">
              <h5 class="card-title">{{ $p->package_name }}</h5>
              <p class="card-text text-muted">{{ Str::limit($p->package_desc, 100) }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Rp {{ number_format($p->package_price,0,',','.') }}</span>
                <a href="#" class="btn btn-sm btn-outline-dark disabled">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p>Belum ada paket.</p>
      @endforelse
    </div>
  </div>
</section>

<section id="pemesanan" class="py-5 bg-light">
  <div class="container">
    <h2 class="mb-3 fw-bold">Pemesanan</h2>
    <p class="text-muted">Form pemesanan akan dibuat pada langkah berikutnya.</p>
  </div>
</section>

<section id="status" class="py-5">
  <div class="container">
    <h2 class="mb-3 fw-bold">Informasi Status Pesanan</h2>
    <p class="text-muted">Status pesanan akan dikirim melalui email setelah Anda membuat pesanan.</p>
  </div>
  
</section>
@endsection
