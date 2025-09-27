@extends('layouts.public')
@php($title = 'Edit Paket')

@section('content')
<div class="container py-4" style="max-width: 860px;">
  <h3 class="mb-3">Edit Paket</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.catalogues.update',$item) }}" enctype="multipart/form-data" class="vstack gap-3">
    @csrf @method('PUT')
    <div>
      <label class="form-label">Nama Paket</label>
      <input name="package_name" class="form-control" required maxlength="100" value="{{ old('package_name',$item->package_name) }}">
    </div>
    <div>
      <label class="form-label">Deskripsi</label>
      <textarea name="package_desc" class="form-control" rows="4" required>{{ old('package_desc',$item->package_desc) }}</textarea>
    </div>
    <div>
      <label class="form-label">Harga</label>
      <input type="number" name="package_price" class="form-control" required min="0" step="1" value="{{ old('package_price',$item->package_price) }}">
    </div>
    <div>
      <label class="form-label d-block">Cover Saat Ini</label>
      @if($item->cover_image)
        <img src="{{ asset($item->cover_image) }}" alt="" style="height:100px;object-fit:cover;border-radius:8px">
      @else
        <span class="text-muted">-</span>
      @endif
    </div>
    <div>
      <label class="form-label">Ganti Cover (opsional)</label>
      <input type="file" name="cover_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
    </div>
    <div>
      <button class="btn btn-dark">Simpan Perubahan</button>
      <a href="{{ route('admin.catalogues.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection
