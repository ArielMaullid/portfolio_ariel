@extends('layouts.app')

@section('title', '403 — Akses Ditolak')

@section('content')
<section class="section" style="min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center">
        <div class="error-code">403</div>
        <h1 class="hero-title" style="font-size: 2rem;">Akses Ditolak</h1>
        <p class="text-muted-2 mb-4" style="max-width: 480px; margin: 0 auto 1.5rem;">
            Anda tidak memiliki izin untuk mengakses halaman ini.
        </p>
        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="bi bi-house me-1"></i> Ke Homepage
            </a>
        </div>
    </div>
</section>

<style>
    .error-code {
        font-size: clamp(5rem, 15vw, 9rem);
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.04em;
        background: linear-gradient(135deg, #F59E0B, color-mix(in srgb, #F59E0B 40%, var(--bg)));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }
</style>
@endsection