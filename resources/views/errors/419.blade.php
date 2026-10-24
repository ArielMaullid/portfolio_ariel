@extends('layouts.app')

@section('title', '419 — Sesi Kedaluwarsa')

@section('content')
<section class="section" style="min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center">
        <div class="error-code">419</div>
        <h1 class="hero-title" style="font-size: 2rem;">Sesi Kedaluwarsa</h1>
        <p class="text-muted-2 mb-4" style="max-width: 480px; margin: 0 auto 1.5rem;">
            Sesi Anda sudah berakhir. Silakan muat ulang halaman dan coba lagi.
        </p>
        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="bi bi-house me-1"></i> Ke Homepage
            </a>
            <a href="javascript:location.reload()" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-clockwise me-1"></i> Muat Ulang
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
        background: linear-gradient(135deg, #8B5CF6, color-mix(in srgb, #8B5CF6 40%, var(--bg)));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }
</style>
@endsection