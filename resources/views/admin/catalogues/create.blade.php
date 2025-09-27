@extends('layouts.public')
@php($title = 'Tambah Paket')

@section('content')
<div class="container py-4" style="max-width: 860px;">
  <h3 class="mb-3">Tambah Paket</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.catalogues.store') }}" enctype="multipart/form-data" class="vstack gap-3">
    @csrf
    <div>
      <label class="form-label">Nama Paket</label>
      <input name="package_name" class="form-control" required maxlength="100" value="{{ old('package_name') }}">
    </div>
    <div>
      <label class="form-label">Deskripsi</label>
      <textarea name="package_desc" class="form-control" rows="4" required>{{ old('package_desc') }}</textarea>
    </div>
    <div>
      <label class="form-label">Harga</label>
      <input type="number" name="package_price" class="form-control" required min="0" step="1" value="{{ old('package_price') }}">
    </div>
    <div>
      <label class="form-label">Cover (jpg/png/webp, maks 2MB)</label>
      <input type="file" name="cover_image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
    </div>
    <div>
      <button class="btn btn-dark">Simpan</button>
      <a href="{{ route('admin.catalogues.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
