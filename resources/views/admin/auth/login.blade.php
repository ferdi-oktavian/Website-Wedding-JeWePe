<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin - JeWePe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10 col-md-6 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="mb-3 text-center">Admin Login</h4>
            @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

            <form method="POST" action="{{ route('admin.login.post') }}" class="vstack gap-3">
              @csrf
              <div>
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div>
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <button class="btn btn-dark w-100">Login</button>
            </form>
            <div class="text-center mt-3">
              <a href="{{ route('home') }}" class="small">← Kembali ke situs</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
