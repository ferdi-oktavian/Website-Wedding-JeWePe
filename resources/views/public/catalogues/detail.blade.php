@extends('layouts.public')
@php($title = 'Detail: '.$catalogue->package_name)

@section('content')
<div class="container py-5" style="max-width: 1000px;">
  <nav class="mb-3">
    <a href="{{ route('catalogues.index') }}" class="text-decoration-none">← Kembali ke Katalog</a>
  </nav>

  <div class="row g-4 align-items-start">
    <div class="col-md-6">
      <img 
        src="{{ $catalogue->cover_image ? asset($catalogue->cover_image) : 'https://via.placeholder.com/800x500?text=No+Image' }}" 
        class="img-fluid rounded shadow" 
        alt="Cover Paket">
    </div>

    <div class="col-md-6">
      <h2 class="fw-bold mb-2">{{ $catalogue->package_name }}</h2>
      <p class="text-muted mb-3">
        Harga mulai: <strong>Rp {{ number_format($catalogue->package_price,0,',','.') }}</strong>
      </p>

      {{-- Deskripsi paket (variabel dari controller) --}}
      @if(!empty($lines) && count($lines) > 1)
        <h6 class="fw-semibold mt-3">Yang termasuk dalam paket:</h6>
        <ul class="mb-3">
          @foreach($lines as $line)
            <li>{{ $line }}</li>
          @endforeach
        </ul>
      @else
        <p>{{ $desc !== '' ? $desc : 'Belum ada deskripsi terperinci untuk paket ini.' }}</p>
      @endif

      <div class="alert alert-info mt-3 mb-0">
        Halaman ini hanya berisi informasi paket.
        Untuk pemesanan, silakan buka menu <strong>Pemesanan</strong> di navigasi.
      </div>
    </div>
  </div>
</div>
@endsection
