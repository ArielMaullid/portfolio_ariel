@extends('layouts.auth')

@section('title', 'Login Admin')

@section('content')

    <h1 class="auth-title">Login</h1>
    <p class="auth-subtitle">Masuk ke panel admin untuk mengelola portfolio.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle me-1"></i>
            @foreach ($errors->all() as $error)
                {{ $error }}@if(!$loop->last)<br>@endif
            @endforeach
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"
                   id="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="admin@example.com"
                   required
                   autofocus
                   autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password"
                   id="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="••••••••••••"
                   required
                   autocomplete="current-password">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox"
                   id="remember"
                   name="remember"
                   class="form-check-input">
            <label for="remember" class="form-check-label">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </button>
    </form>

@endsection