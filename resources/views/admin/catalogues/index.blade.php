@extends('layouts.public')
@php($title = 'Kelola Catalogue')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Catalogue</h3>
    <a href="{{ route('admin.catalogues.create') }}" class="btn btn-dark btn-sm">Tambah Paket</a>
  </div>

  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>Cover</th>
          <th>Paket</th>
          <th>Harga</th>
          <th width="180">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $it)
          <tr>
            <td style="width:90px">
              @if($it->cover_image)
                <img src="{{ asset($it->cover_image) }}" alt="" style="height:60px;object-fit:cover;border-radius:8px">
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td>
              <div class="fw-semibold">{{ $it->package_name }}</div>
              <div class="text-muted small">{{ \Illuminate\Support\Str::limit($it->package_desc, 60) }}</div>
            </td>
            <td>Rp {{ number_format($it->package_price,0,',','.') }}</td>
            <td>
              <a href="{{ route('admin.catalogues.edit',$it) }}" class="btn btn-sm btn-outline-dark">Edit</a>
              <form action="{{ route('admin.catalogues.destroy',$it) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Hapus paket ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="text-center text-muted">Belum ada paket.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $items->links() }}
  </div>
</div>
@endsection
