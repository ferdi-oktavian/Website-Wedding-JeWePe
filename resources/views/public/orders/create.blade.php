@extends('layouts.public')

@php($title = 'Buat Pesanan')

@section('content')
<div class="container py-5">
  <h2 class="fw-bold mb-4">Buat Pesanan</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('orders.store') }}" class="row g-3">
    @csrf

    <div class="col-md-6">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control" required maxlength="50">
    </div>

    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="customer_email" value="{{ old('customer_email') }}" class="form-control" required maxlength="191">
    </div>

    <div class="col-md-6">
      <label class="form-label">No. Telepon (opsional)</label>
      <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" class="form-control" maxlength="20">
    </div>

    <div class="col-md-6">
      <label class="form-label">Pilih Paket</label>
      <select name="package_id" class="form-select" required>
        <option value="">-- Pilih Paket --</option>
        @foreach($packages as $pkg)
          <option value="{{ $pkg->id }}" {{ (old('package_id', $selected)==$pkg->id) ? 'selected' : '' }}>
            {{ $pkg->package_name }} — Rp {{ number_format($pkg->package_price,0,',','.') }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="col-md-6">
      <label class="form-label">Metode Pembayaran</label>
      <select name="payment_method" class="form-select" required>
        <option value="">-- Pilih Metode --</option>
        <option value="bank_transfer" {{ old('payment_method')=='bank_transfer' ? 'selected':'' }}>Transfer Bank</option>
        <option value="e_wallet"      {{ old('payment_method')=='e_wallet'      ? 'selected':'' }}>E-Wallet</option>
        <option value="cod"           {{ old('payment_method')=='cod'           ? 'selected':'' }}>COD/DP saat meeting</option>
      </select>
    </div>

    <div class="col-12">
      <label class="form-label">Catatan (opsional)</label>
      <textarea name="notes" class="form-control" rows="3" maxlength="500" placeholder="Tulis preferensi tema, lokasi, tanggal, dll (opsional)">{{ old('notes') }}</textarea>
      {{-- Catatan tidak disimpan karena tidak ada kolomnya; tinggal tambahkan kolom jika nanti diperlukan --}}
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-dark btn-lg">Buat Pesanan</button>
    </div>
  </form>
</div>
@endsection
