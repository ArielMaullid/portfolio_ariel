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

    $hasGithub   = !empty($project->github_url);
    $hasDemo     = !empty($project->demo_url);
    $hasFeatures = !empty($project->features) && is_array($project->features);
    $hasTech     = !empty($project->technologies) && is_array($project->technologies);
    $hasGallery  = !empty($project->gallery) && is_array($project->gallery);
@endphp

{{-- ============ HERO ============ --}}
<section class="case-hero">
    <div class="container">
        <nav aria-label="breadcrumb" class="case-breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($project->title, 40) }}</li>
            </ol>
        </nav>

        <div class="case-hero-content">
            <div class="case-hero-meta">
                <span class="case-cat">{{ $project->category }}</span>
                @if($project->year)
                    <span class="case-dot">·</span>
                    <span class="case-year">{{ $project->year }}</span>
                @endif
            </div>

            <h1 class="case-title">{{ $project->title }}</h1>
            <p class="case-lead">{{ $project->short_desc }}</p>

            <div class="case-meta-grid">
                @if($project->role)
                    <div class="case-meta-item">
                        <span class="case-meta-label">Role</span>
                        <span class="case-meta-value">{{ $project->role }}</span>
                    </div>
                @endif
                @if($project->duration)
                    <div class="case-meta-item">
                        <span class="case-meta-label">Duration</span>
                        <span class="case-meta-value">{{ $project->duration }}</span>
                    </div>
                @endif
            </div>

            @if($hasGithub || $hasDemo)
                <div class="case-actions">
                    @if($hasDemo)
                        <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn btn-primary">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Live Demo
                        </a>
                    @endif
                    @if($hasGithub)
                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">
                            <i class="bi bi-github me-1"></i> View on GitHub
                        </a>
                    @endif
                </div>
            @endif
        </div>

        <div class="case-cover">
            <img src="{{ $imgUrl }}" alt="Screenshot {{ $project->title }}" loading="eager">
        </div>
    </div>
</section>

{{-- ============ CONTENT ============ --}}
<section class="case-content">
    <div class="container">
        <div class="row g-5">

            {{-- MAIN --}}
            <div class="col-lg-8">
                
                {{-- Overview --}}
                @if($project->description)
                    <div class="case-block">
                        <h2 class="case-heading">Project Overview</h2>
                        <div class="case-body">{!! nl2br(e($project->description)) !!}</div>
                    </div>
                @endif

                {{-- Problem & Goal --}}
                @if($project->background || $project->objective)
                    <div class="case-block">
                        <div class="row g-4">
                            @if($project->background)
                                <div class="col-md-6">
                                    <h2 class="case-heading">Background & Problem</h2>
                                    <div class="case-body">{!! nl2br(e($project->background)) !!}</div>
                                </div>
                            @endif
                            @if($project->objective)
                                <div class="col-md-6">
                                    <h2 class="case-heading">Project Objectives</h2>
                                    <div class="case-body">{!! nl2br(e($project->objective)) !!}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Role --}}
                @if($project->contribution)
                    <div class="case-block">
                        <h2 class="case-heading">My Role & Responsibilities</h2>
                        <div class="case-body">{!! nl2br(e($project->contribution)) !!}</div>
                    </div>
                @endif

                {{-- Features --}}
                @if($hasFeatures)
                    <div class="case-block">
                        <h2 class="case-heading">Key Features</h2>
                        <ul class="case-features">
                            @foreach($project->features as $feature)
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Development Process --}}
                @if($project->development)
                    <div class="case-block">
                        <h2 class="case-heading">Development Process</h2>
                        <div class="case-body">{!! nl2br(e($project->development)) !!}</div>
                    </div>
                @endif

                {{-- Challenges & Solutions --}}
                @if($project->challenges)
                    <div class="case-block p-4" style="background: var(--surface-2); border-radius: var(--radius); border: 1px solid var(--border);">
                        <h2 class="case-heading" style="font-size: 1.2rem; margin-bottom: 0.5rem;">Challenges & Solutions</h2>
                        <div class="case-body">{!! nl2br(e($project->challenges)) !!}</div>
                    </div>
                @endif

                {{-- Result --}}
                @if($project->result)
                    <div class="case-block">
                        <h2 class="case-heading">Results & Evaluation</h2>
                        <div class="case-body">{!! nl2br(e($project->result)) !!}</div>
                    </div>
                @endif

                {{-- Reflection --}}
                @if($project->reflection)
                    <div class="case-block">
                        <h2 class="case-heading">Lessons Learned</h2>
                        <div class="case-body">{!! nl2br(e($project->reflection)) !!}</div>
                    </div>
                @endif

                {{-- Gallery Screenshots --}}
                @if($hasGallery)
                    <div class="case-block">
                        <h2 class="case-heading">Project Screenshots</h2>
                        <div class="case-gallery">
                            @foreach($project->gallery as $img)
                                <a href="{{ asset($img) }}" target="_blank" rel="noopener" class="case-gallery-item">
                                    <img src="{{ asset($img) }}" alt="Screenshot {{ $project->title }}" loading="lazy">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <aside class="case-sidebar">
                    @if($hasTech)
                        <div class="sidebar-card">
                            <h3 class="sidebar-title">Technology Stack</h3>
                            <div class="project-tech">
                                @foreach($project->technologies as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Project Info</h3>
                        <ul class="info-list">
                            <li>
                                <i class="bi bi-tag"></i>
                                <div><strong>Category</strong><br><small>{{ $project->category }}</small></div>
                            </li>
                            @if($project->year)
                                <li>
                                    <i class="bi bi-calendar"></i>
                                    <div><strong>Year</strong><br><small>{{ $project->year }}</small></div>
                                </li>
                            @endif
                            @if($project->role)
                                <li>
                                    <i class="bi bi-person-badge"></i>
                                    <div><strong>Role</strong><br><small>{{ $project->role }}</small></div>
                                </li>
                            @endif
                            @if($project->duration)
                                <li>
                                    <i class="bi bi-clock-history"></i>
                                    <div><strong>Duration</strong><br><small>{{ $project->duration }}</small></div>
                                </li>
                            @endif
                        </ul>
                    </div>

                    {{-- CTA Sidebar --}}
                    <div class="sidebar-card text-center mt-4" style="background: var(--accent-soft); border-color: transparent;">
                        <h4 class="h6 mb-2 text-dark">Tertarik dengan proyek ini?</h4>
                        <a href="{{ route('home') }}#contact" class="btn btn-primary w-100 btn-sm">Hubungi Saya</a>
                    </div>
                </aside>
            </div>

        </div>

        {{-- Related Projects --}}
        @if($related->isNotEmpty())
            <div class="case-related">
                <div class="case-related-header">
                    <span class="section-eyebrow">Lainnya</span>
                    <h2 class="case-related-title">Proyek Terkait</h2>
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

@endsection

@push('head')
<style>
    /* ============================================================
       PHASE 4 — CASE STUDY STYLING
       ============================================================ */
    .case-hero { padding: 3rem 0 2rem; }
    .case-breadcrumb { margin-bottom: 2rem; }
    .case-breadcrumb .breadcrumb { font-size: .85rem; }
    .case-breadcrumb a { color: var(--text-2); text-decoration: none; }
    .case-breadcrumb a:hover { color: var(--accent); }
    
    .case-hero-meta { display: flex; align-items: center; gap: .5rem; margin-bottom: 1rem; }
    .case-cat { font-size: .78rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: var(--accent); }
    .case-dot { color: var(--text-3); }
    .case-year { font-size: .85rem; color: var(--text-2); font-weight: 500; }
    
    .case-title { font-size: clamp(1.75rem, 4vw, 2.6rem); font-weight: 800; line-height: 1.15; letter-spacing: -0.03em; margin-bottom: 1rem; color: var(--text-1); }
    .case-lead { font-size: 1.1rem; color: var(--text-2); max-width: 680px; margin-bottom: 1.75rem; }
    
    .case-meta-grid { display: flex; flex-wrap: wrap; gap: 2rem; margin-bottom: 1.75rem; padding-bottom: 1.75rem; border-bottom: 1px solid var(--border); }
    .case-meta-item { display: flex; flex-direction: column; gap: .2rem; }
    .case-meta-label { font-size: .72rem; text-transform: uppercase; letter-spacing: .06em; color: var(--text-3); font-weight: 700; }
    .case-meta-value { font-size: .95rem; color: var(--text-1); font-weight: 600; }
    
    .case-actions { display: flex; flex-wrap: wrap; gap: .65rem; margin-bottom: 2.5rem; }
    .case-cover { border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--border); box-shadow: var(--shadow-md); background: var(--surface); }
    .case-cover img { width: 100%; height: auto; display: block; aspect-ratio: 16 / 9; object-fit: cover; }

    .case-content { padding: 3rem 0 5rem; }
    .case-block { margin-bottom: 3.5rem; }
    .case-heading { font-size: 1.35rem; font-weight: 700; color: var(--text-1); margin-bottom: 1rem; position: relative; padding-bottom: .55rem; letter-spacing: -0.01em; }
    .case-heading::after { content: ''; position: absolute; left: 0; bottom: 0; width: 36px; height: 3px; background: var(--accent); border-radius: 2px; }
    .case-body { font-size: 1rem; line-height: 1.75; color: var(--text-2); }
    
    .case-features { list-style: none; padding: 0; margin: 0; display: grid; gap: .75rem; }
    .case-features li { display: flex; align-items: flex-start; gap: .75rem; padding: .85rem 1rem; background: var(--surface); border: 1px solid var(--border); border-radius: 10px; font-size: .95rem; color: var(--text-1); }
    .case-features li i { color: #10B981; flex-shrink: 0; margin-top: .15rem; }

    /* Gallery */
    .case-gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1rem; }
    .case-gallery-item { display: block; border-radius: var(--radius); overflow: hidden; border: 1px solid var(--border); transition: transform .3s ease; aspect-ratio: 16 / 10; }
    .case-gallery-item:hover { transform: translateY(-3px); }
    .case-gallery-item img { width: 100%; height: 100%; object-fit: cover; }

    /* Sidebar */
    .case-sidebar { position: sticky; top: 88px; }
    .sidebar-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 1.25rem; margin-bottom: 1rem; }
    .sidebar-title { font-size: .82rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: var(--text-3); margin-bottom: 1rem; }
    
    .info-list { list-style: none; padding: 0; margin: 0; }
    .info-list li { display: flex; gap: .75rem; padding: .6rem 0; border-bottom: 1px solid var(--border); color: var(--text-2); }
    .info-list li:last-child { border-bottom: none; padding-bottom: 0; }
    .info-list li:first-child { padding-top: 0; }
    .info-list i { color: var(--accent); font-size: 1.05rem; flex-shrink: 0; margin-top: .1rem; }
    .info-list strong { font-size: .82rem; color: var(--text-1); font-weight: 600; }
    .info-list small { font-size: .85rem; color: var(--text-2); }

    @media (max-width: 991px) {
        .case-sidebar { position: static; margin-top: 2rem; }
    }
    @media (max-width: 576px) {
        .case-hero { padding: 2rem 0 1.5rem; }
        .case-meta-grid { gap: 1.25rem; }
        .case-actions { flex-direction: column; }
        .case-actions .btn { width: 100%; }
        .case-gallery { grid-template-columns: 1fr; }
    }
</style>
@endpush