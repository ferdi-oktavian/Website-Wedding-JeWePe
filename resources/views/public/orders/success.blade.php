@extends('layouts.public')

@php($title = 'Pesanan Berhasil')

@section('content')
<div class="container py-5 text-center">
  <div class="display-6 mb-3">✅ Pesanan Berhasil Dibuat</div>

  <p>Kode Pesanan: <strong>{{ $orderCode }}</strong></p>
  <p>Paket: <strong>{{ $packageName }}</strong></p>
  <p>Metode Pembayaran: <strong>{{ str_replace(['bank_transfer','e_wallet','cod'],['Transfer Bank','E-Wallet','COD/DP'], $paymentMethod) }}</strong></p>
  <p>Total: <strong>Rp {{ number_format($totalPrice,0,',','.') }}</strong></p>

  <hr class="my-4">
  <p class="text-muted">Silakan <strong>tunggu email dari admin</strong> untuk konfirmasi & instruksi pembayaran.</p>

  <a href="{{ route('home') }}" class="btn btn-outline-dark mt-3">Kembali ke Beranda</a>
</div>
@endsection
