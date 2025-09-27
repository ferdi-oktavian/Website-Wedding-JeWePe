@extends('layouts.public')
@php($title = 'Admin Dashboard')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Dashboard Admin</h3>
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button class="btn btn-outline-danger btn-sm">Logout</button>
    </form>
  </div>

  <div class="row g-3">
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Total Orders</div>
          <div class="fs-3 fw-bold">{{ $totalOrders }}</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Pending</div>
          <div class="fs-3 fw-bold">{{ $pending }}</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Approved</div>
          <div class="fs-3 fw-bold">{{ $approved }}</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small">Total Catalogues</div>
          <div class="fs-3 fw-bold">{{ $totalPackages }}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">
    
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark btn-sm">Kelola Orders</a>
    <a href="{{ route('admin.catalogues.index') }}" class="btn btn-outline-dark btn-sm">Kelola Catalogue</a>

    {{-- Nanti kita hidupkan link di atas saat CRUD siap --}}
  </div>

  <div class="mt-4">
    <div class="card">
      <div class="card-body">
        <div class="text-muted small mb-2">Site Name</div>
        <div class="fw-semibold">{{ $setting->site_name ?? 'Wedding Organizer JeWePe' }}</div>
      </div>
    </div>
  </div>
</div>
@endsection
