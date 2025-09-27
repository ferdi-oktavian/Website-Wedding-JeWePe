<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Wedding Organizer JeWePe' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color:#b52e4c; --primary-light:#d4506b; --primary-dark:#8b2239;
      --accent-color:#f6e9ec; --gold-accent:#d4af37; --text-dark:#2c2c2c; --text-light:#6c757d;
      --gradient-primary:linear-gradient(135deg,#b52e4c 0%,#d4506b 100%);
      --gradient-hero:linear-gradient(135deg,rgba(245,232,236,.9) 0%,rgba(246,233,236,.95) 100%);
    }
    body{font-family:'Inter',sans-serif;background:#fafafa;color:var(--text-dark);line-height:1.6}
    .navbar{backdrop-filter:blur(10px);background:rgba(255,255,255,.95)!important}
    .navbar-brand{font-family:'Playfair Display',serif;font-size:2rem;font-weight:600;color:var(--primary-color)!important}
    .nav-link{font-weight:500;color:var(--text-dark)!important;border-radius:8px;padding:.75rem 1rem!important;margin:0 .25rem}
    .nav-link:hover{color:var(--primary-color)!important;background:var(--accent-color)}
    .nav-link.active{color:var(--primary-color)!important;background:var(--accent-color)}
    /* HERO: akan dipakai hanya jika halaman mendefinisikan @section('hero') */
    .hero{background:var(--gradient-hero);min-height:70vh;display:flex;align-items:center;position:relative;overflow:hidden}
    .btn-primary{background:var(--gradient-primary);border:none;border-radius:50px;padding:14px 32px;font-weight:700}
    footer{background:linear-gradient(135deg,var(--primary-dark) 0%,var(--primary-color) 100%);color:#fff;padding:2rem 0;margin-top:4rem}
    .package-card{border:none;border-radius:16px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08)}
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">JeWePe</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
              <i class="fas fa-home me-1"></i>Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('catalogues.*') ? 'active' : '' }}" href="{{ route('catalogues.index') }}">
              <i class="fas fa-book me-1"></i>Katalog Paket
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" href="{{ route('orders.create') }}">
              <i class="fas fa-calendar-check me-1"></i>Pemesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.login') }}">
              <i class="fas fa-user-shield me-1"></i>Login Admin
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- HERO hanya muncul jika halaman mendefinisikan section "hero" --}}
  @hasSection('hero')
    @yield('hero')
  @endif

  <main>
    @yield('content')
  </main>

  <footer class="text-center">
    <div class="container">
      <p class="mb-0">
        <i class="fas fa-heart text-danger me-2"></i>
        © {{ date('Y') }} Wedding Organizer JeWePe
        <i class="fas fa-heart text-danger ms-2"></i>
      </p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
