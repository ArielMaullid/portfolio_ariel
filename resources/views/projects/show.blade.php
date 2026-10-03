@extends('layouts.app')

@section('title', $project->title . ' — ' . config('portfolio.name'))
@section('meta_description', $project->short_desc)
@section('og_title', $project->title)

@if($project->image)
    @section('og_image', asset($project->image))
@endif

@section('content')

@php
    $imgPath = $project->image ? public_path($project->image) : null;
    $imgUrl = ($imgPath && file_exists($imgPath))
        ? asset($project->image)
        : 'https://placehold.co/1200x600/2563EB/FFFFFF?text=' . urlencode($project->title);

    $hasGithub = !empty($project->github_url);
    $hasDemo   = !empty($project->demo_url);
@endphp

{{-- Header / Breadcrumb --}}
<section style="padding: 32px 0 24px; border-bottom: 1px solid var(--border);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($project->title, 40) }}</li>
            </ol>
        </nav>

        <div class="row align-items-end g-3">
            <div class="col-lg-8">
                <span class="project-category">{{ $project->category }}
                    @if($project->year) · {{ $project->year }} @endif
                </span>
                <h1 class="hero-title" style="font-size: clamp(1.75rem, 4vw, 2.5rem); margin-bottom: 0.75rem;">
                    {{ $project->title }}
                </h1>
                <p class="text-muted-2 mb-0" style="font-size: 1.05rem;">
                    {{ $project->short_desc }}
                </p>
            </div>

            @if($hasGithub || $hasDemo)
                <div class="col-lg-4">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        @if($hasGithub)
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                               class="btn btn-outline-secondary">
                                <i class="bi bi-github me-1"></i> View GitHub
                            </a>
                        @endif
                        @if($hasDemo)
                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener"
                               class="btn btn-primary">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Live Demo
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Hero Image --}}
<section style="padding: 40px 0;">
    <div class="container">
        <div class="project-hero-image reveal">
            <img src="{{ $imgUrl }}" alt="Screenshot {{ $project->title }}" loading="eager">
        </div>
    </div>
</section>

{{-- Content --}}
<section style="padding: 24px 0 80px;">
    <div class="container">
        <div class="row g-5">
            {{-- Main --}}
            <div class="col-lg-8">

                @if($project->description)
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Deskripsi</h2>
                        <div class="detail-content">{!! nl2br(e($project->description)) !!}</div>
                    </div>
                @endif

                @if($project->background)
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Latar Belakang</h2>
                        <div class="detail-content">{!! nl2br(e($project->background)) !!}</div>
                    </div>
                @endif

                @if($project->objective)
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Tujuan</h2>
                        <div class="detail-content">{!! nl2br(e($project->objective)) !!}</div>
                    </div>
                @endif

                @if(!empty($project->features))
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Fitur Utama</h2>
                        <ul class="feature-list">
                            @foreach($project->features as $feature)
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($project->contribution)
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Kontribusi Saya</h2>
                        <div class="detail-content">{!! nl2br(e($project->contribution)) !!}</div>
                    </div>
                @endif

                @if($project->development)
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Proses Pengembangan</h2>
                        <div class="detail-content">{!! nl2br(e($project->development)) !!}</div>
                    </div>
                @endif

                @if($project->result)
                    <div class="detail-block reveal">
                        <h2 class="detail-heading">Hasil</h2>
                        <div class="detail-content">{!! nl2br(e($project->result)) !!}</div>
                    </div>
                @endif

                {{-- Fallback kalau semua field null --}}
                @if(
                    !$project->description &&
                    !$project->background &&
                    !$project->objective &&
                    empty($project->features) &&
                    !$project->contribution &&
                    !$project->development &&
                    !$project->result
                )
                    <div class="card-surface p-4 reveal">
                        <p class="text-muted-2 mb-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Detail project ini belum dilengkapi.
                        </p>
                    </div>
                @endif

            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div class="project-sidebar">

                    @if(!empty($project->technologies))
                        <div class="sidebar-card reveal">
                            <h3 class="sidebar-title">Teknologi</h3>
                            <div class="project-tech">
                                @foreach($project->technologies as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="sidebar-card reveal">
                        <h3 class="sidebar-title">Informasi</h3>
                        <ul class="info-list">
                            <li>
                                <i class="bi bi-tag"></i>
                                <div>
                                    <strong>Kategori</strong><br>
                                    <small class="text-muted-2">{{ $project->category }}</small>
                                </div>
                            </li>
                            @if($project->year)
                                <li>
                                    <i class="bi bi-calendar"></i>
                                    <div>
                                        <strong>Tahun</strong><br>
                                        <small class="text-muted-2">{{ $project->year }}</small>
                                    </div>
                                </li>
                            @endif
                            <li>
                                <i class="bi bi-clock"></i>
                                <div>
                                    <strong>Ditambahkan</strong><br>
                                    <small class="text-muted-2">{{ $project->created_at->format('d M Y') }}</small>
                                </div>
                            </li>
                        </ul>
                    </div>

                    @if($hasGithub || $hasDemo)
                        <div class="sidebar-card reveal">
                            <h3 class="sidebar-title">Link</h3>
                            <div class="d-grid gap-2">
                                @if($hasGithub)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                                       class="btn btn-outline-secondary">
                                        <i class="bi bi-github me-1"></i> GitHub Repository
                                    </a>
                                @endif
                                @if($hasDemo)
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener"
                                       class="btn btn-primary">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Live Demo
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- Related Projects --}}
        @if($related->isNotEmpty())
            <div class="mt-5 pt-5" style="border-top: 1px solid var(--border);">
                <div class="mb-4 reveal">
                    <span class="section-eyebrow">Lainnya</span>
                    <h2 class="section-title mb-0" style="font-size: 1.5rem;">Project Serupa</h2>
                </div>
                <div class="row g-4">
                    @foreach($related as $rel)
                        <div class="col-md-6 col-lg-4">
                            <x-project-card :project="$rel" />
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>

<style>
    .project-hero-image {
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
        box-shadow: var(--shadow-md);
    }
    .project-hero-image img {
        width: 100%;
        height: auto;
        display: block;
        aspect-ratio: 16 / 9;
        object-fit: cover;
    }

    .detail-block {
        margin-bottom: 2.5rem;
    }
    .detail-block:last-child {
        margin-bottom: 0;
    }
    .detail-heading {
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--text-1);
        position: relative;
        padding-bottom: 0.5rem;
    }
    .detail-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: var(--accent);
        border-radius: 2px;
    }
    .detail-content {
        color: var(--text-2);
        font-size: 1rem;
        line-height: 1.75;
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 0.6rem;
    }
    .feature-list li {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 0.65rem 0.9rem;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 0.95rem;
        color: var(--text-1);
    }
    .feature-list li i {
        color: #10B981;
        flex-shrink: 0;
        margin-top: 0.15rem;
    }

    .project-sidebar {
        position: sticky;
        top: 88px;
    }
    .sidebar-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    .sidebar-card:last-child {
        margin-bottom: 0;
    }
    .sidebar-title {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-2);
        margin-bottom: 1rem;
    }
    .sidebar-card .info-list li {
        padding: 0.5rem 0;
    }
    .sidebar-card .info-list li strong {
        font-size: 0.85rem;
        color: var(--text-1);
        font-weight: 600;
    }

    @media (max-width: 991px) {
        .project-sidebar {
            position: static;
        }
    }

    /* Breadcrumb */
    .breadcrumb {
        --bs-breadcrumb-divider-color: var(--text-2);
        --bs-breadcrumb-item-active-color: var(--text-2);
    }
    .breadcrumb a {
        color: var(--text-2);
    }
    .breadcrumb a:hover {
        color: var(--accent);
    }
</style>

@endsection