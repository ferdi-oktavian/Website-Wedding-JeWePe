@extends('layouts.public')
@php($title = 'Form Pemesanan')

@section('content')
<div class="container py-5" style="max-width: 720px;">
  <h2 class="fw-bold mb-4">Form Pemesanan</h2>

  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
  @if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif

  <form method="POST" action="{{ route('orders.store') }}" class="vstack gap-3">
    @csrf
    <div>
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="customer_name" class="form-control" required>
    </div>
    <div>
      <label class="form-label">Email</label>
      <input type="email" name="customer_email" class="form-control" required>
    </div>
    <div>
      <label class="form-label">Nomor Telepon</label>
      <input type="text" name="customer_phone" class="form-control">
    </div>
    <div>
      <label class="form-label">Metode Pembayaran</label>
      <select name="payment_method" class="form-select" required>
        <option value="bank_transfer">Transfer Bank</option>
        <option value="e_wallet">E-Wallet</option>
        <option value="cod">COD / DP</option>
      </select>
    </div>
    <button class="btn btn-primary">Buat Pesanan</button>
  </form>
</div>
@endsection
