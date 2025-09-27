@extends('layouts.public')
@php($title = 'Katalog Paket')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold mb-4">Katalog Paket</h2>

  <div class="row g-4">
    @forelse($packages as $p)
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card package-card h-100">
          <img src="{{ $p->cover_image ? asset($p->cover_image) : 'https://via.placeholder.com/600x400?text=Paket' }}"
               class="card-img-top" alt="Paket">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $p->package_name }}</h5>
            <p class="text-muted mb-2">Rp {{ number_format($p->package_price,0,',','.') }}</p>
            <p class="text-muted">{{ \Illuminate\Support\Str::limit($p->package_desc, 100) }}</p>
            <div class="mt-auto">
              <a href="{{ route('catalogues.detail',$p) }}" class="btn btn-outline-dark w-100">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-muted">Belum ada paket.</p>
    @endforelse
  </div>
</div>
@endsection
