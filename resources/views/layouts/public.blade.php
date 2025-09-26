<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Wedding Organizer JeWePe' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero{background:#f6e9ec}
    .package-card img{object-fit:cover;height:180px}
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('home') }}">JeWePe</a>
      <div class="d-flex gap-3">
        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
        <a class="nav-link" href="#katalog">Katalog Paket</a>
        <a class="nav-link" href="{{ route('orders.create') }}">Pemesanan</a>
        <a class="nav-link" href="#status">Informasi Status</a>
      </div>
    </div>
  </nav>

  <main>@yield('content')</main>

  <footer class="py-4 text-center small text-muted border-top mt-5">
    © {{ date('Y') }} Wedding Organizer JeWePe
  </footer>
</body>
</html>
