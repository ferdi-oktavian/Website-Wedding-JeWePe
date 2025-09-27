@extends('layouts.public')
@php($title = 'Kelola Orders')

@section('content')
<div class="container py-4">
  <h3 class="mb-3">Daftar Pesanan</h3>

  @if(session('success')) 
    <div class="alert alert-success">{{ session('success') }}</div> 
  @endif

  <div class="table-responsive">
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th>Kode</th>
          <th>Pemesan</th>
          <th>Paket</th>
          <th>Total</th>
          <th>Metode</th>
          <th>Status</th>
          <th>Dibuat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($orders as $o)
          <tr>
            <td>{{ $o->order_code }}</td>
            <td>
              <div class="fw-semibold">{{ $o->customer_name }}</div>
              <small>{{ $o->customer_email }}<br>{{ $o->customer_phone }}</small>
            </td>
            <td>{{ $o->package?->package_name }}</td>
            <td>Rp {{ number_format($o->total_price ?? $o->package?->package_price,0,',','.') }}</td>
            <td>
              {{ ['bank_transfer'=>'Transfer Bank','e_wallet'=>'E-Wallet','cod'=>'COD/DP'][$o->payment_method] ?? $o->payment_method }}
            </td>
            <td>
              <span class="badge text-bg-{{ $o->status=='approved'?'success':($o->status=='rejected'?'danger':'secondary') }}">
                {{ ucfirst($o->status) }}
              </span>
            </td>
            <td>{{ $o->created_at->format('d M Y H:i') }}</td>
            <td>
              <form method="POST" action="{{ route('admin.orders.updateStatus',$o) }}">
                @csrf @method('PATCH')
                <select name="status" class="form-select form-select-sm d-inline w-auto me-1">
                  <option value="requested" {{ $o->status=='requested'?'selected':'' }}>Requested</option>
                  <option value="approved"  {{ $o->status=='approved'?'selected':'' }}>Approved</option>
                  <option value="rejected"  {{ $o->status=='rejected'?'selected':'' }}>Rejected</option>
                </select>
                <button class="btn btn-sm btn-dark">Ubah</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center text-muted">Belum ada pesanan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">{{ $orders->links() }}</div>
</div>
@endsection
