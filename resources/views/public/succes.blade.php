@extends('layouts.public')
@php($title = 'Pesanan Berhasil')

@section('content')
<div class="container py-5 text-center">
  <h2 class="mb-3">✅ Pesanan Berhasil Dibuat</h2>
  <p>Kode Pesanan: <strong>{{ $orderCode }}</strong></p>
  <p>Paket: <strong>{{ $packageName }}</strong></p>
  <p>Metode Pembayaran: 
    <strong>
      {{ ['bank_transfer'=>'Transfer Bank','e_wallet'=>'E-Wallet','cod'=>'COD/DP'][$paymentMethod] ?? $paymentMethod }}
    </strong>
  </p>
  <p>Total: <strong>Rp {{ number_format($totalPrice,0,',','.') }}</strong></p>
  <hr>
  <p class="text-muted">Silakan <strong>tunggu email dari admin</strong> untuk konfirmasi & instruksi pembayaran.</p>
  <a href="{{ route('home') }}" class="btn btn-outline-dark mt-3">Kembali ke Beranda</a>
</div>
@endsection
