@extends('layouts.auth')

@section('title', 'Ganti Password')

@section('content')

    <h1 class="auth-title">Ganti Password</h1>
    <p class="auth-subtitle">Ubah password admin Anda secara berkala untuk keamanan.</p>

    @if (session('status'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle me-1"></i>
            @foreach ($errors->all() as $error)
                {{ $error }}@if(!$loop->last)<br>@endif
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Password Saat Ini</label>
            <input type="password"
                   id="current_password"
                   name="current_password"
                   class="form-control @error('current_password') is-invalid @enderror"
                   required
                   autocomplete="current-password">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                Password Baru
                <small class="text-muted ms-1">(min. 12 karakter)</small>
            </label>
            <input type="password"
                   id="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required
                   autocomplete="new-password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password"
                   id="password_confirmation"
                   name="password_confirmation"
                   class="form-control"
                   required
                   autocomplete="new-password">
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary flex-fill">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary flex-fill">
                <i class="bi bi-check-lg me-1"></i> Simpan
            </button>
        </div>
    </form>

    <hr class="my-4" style="border-color: var(--border); opacity: .5;">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
    </form>

    <style>
        .btn-outline-secondary {
            color: var(--text-1);
            border-color: var(--border);
        }
        .btn-outline-secondary:hover {
            background: var(--bg);
            color: var(--text-1);
            border-color: var(--text-2);
        }
    </style>

@endsection