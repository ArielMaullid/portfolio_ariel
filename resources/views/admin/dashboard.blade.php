<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 mb-0">Dashboard Admin</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('password.edit') }}" class="btn btn-outline-secondary btn-sm">Ganti Password</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
        <p class="text-muted">Halo, {{ auth()->user()->name }}. Fitur pengelolaan konten dibuat di Phase 4.</p>
    </div>
</body>
</html>