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

    /* Tambahan untuk navbar */
    .navbar {
      transition: all 0.3s ease;
    }
    .navbar-brand {
      font-size: 1.5rem;
      color: #b52e4c !important; /* warna brand lebih elegan */
    }
    .nav-link {
      font-weight: 500;
      color: #555 !important;
      transition: color 0.2s ease, transform 0.2s ease;
    }
    .nav-link:hover {
      color: #b52e4c !important;
      transform: translateY(-2px);
    }
    .nav-link.active {
      color: #b52e4c !important;
      border-bottom: 2px solid #b52e4c;
    }
    .navbar-toggler {
      border: none;
    }
    .navbar-toggler:focus {
      box-shadow: none;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('home') }}">JeWePe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#katalog">Katalog Paket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.create') }}">Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#status">Informasi Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.login') }}">Login Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>@yield('content')</main>

  <footer class="py-4 text-center small text-muted border-top mt-5">
    © {{ date('Y') }} Wedding Organizer JeWePe
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
