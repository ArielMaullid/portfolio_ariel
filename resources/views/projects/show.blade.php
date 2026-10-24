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
$hasDemo = !empty($project->demo_url);
$hasFeatures = !empty($project->features) && is_array($project->features);
$hasTech = !empty($project->technologies) && is_array($project->technologies);
$hasMeta = $project->role || $project->duration;

$hasAnyContent = $project->description
|| $project->background
|| $project->objective
|| $project->contribution
|| $hasFeatures
|| $project->development
|| $project->challenges
|| $project->result
|| $project->reflection;
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

            @if($hasMeta)
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
            @endif

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

        <div class="case-cover reveal">
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

                @if($project->description)
                <div class="case-block reveal">
                    <h2 class="case-heading">Overview</h2>
                    <div class="case-body">{!! nl2br(e($project->description)) !!}</div>
                </div>
                @endif

                @if($project->background || $project->objective)
                <div class="case-block reveal">
                    <div class="row g-4">
                        @if($project->background)
                        <div class="col-md-6">
                            <h2 class="case-heading">Problem</h2>
                            <div class="case-body">{!! nl2br(e($project->background)) !!}</div>
                        </div>
                        @endif
                        @if($project->objective)
                        <div class="col-md-6">
                            <h2 class="case-heading">Goal</h2>
                            <div class="case-body">{!! nl2br(e($project->objective)) !!}</div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                @if($project->contribution)
                <div class="case-block reveal">
                    <h2 class="case-heading">My Role &amp; Contribution</h2>
                    <div class="case-body">{!! nl2br(e($project->contribution)) !!}</div>
                </div>
                @endif

                @if($hasFeatures)
                <div class="case-block reveal">
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

                @if($project->development)
                <div class="case-block reveal">
                    <h2 class="case-heading">Development Process</h2>
                    <div class="case-body">{!! nl2br(e($project->development)) !!}</div>
                </div>
                @endif

                @if($project->challenges)
                <div class="case-block reveal">
                    <h2 class="case-heading">Challenges</h2>
                    <div class="case-body">{!! nl2br(e($project->challenges)) !!}</div>
                </div>
                @endif

                @if($project->result)
                <div class="case-block reveal">
                    <h2 class="case-heading">Result</h2>
                    <div class="case-body">{!! nl2br(e($project->result)) !!}</div>
                </div>
                @endif

                @if($project->reflection)
                <div class="case-block reveal">
                    <h2 class="case-heading">Reflection</h2>
                    <div class="case-body">{!! nl2br(e($project->reflection)) !!}</div>
                </div>
                @endif

                {{-- Fallback kalau semua field kosong --}}
                @unless($hasAnyContent)
                <div class="card-surface p-4 reveal">
                    <p class="text-muted-2 mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Detail project ini belum dilengkapi.
                    </p>
                </div>
                @endunless

            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <aside class="case-sidebar">

                    @if($hasTech)
                    <div class="sidebar-card reveal">
                        <h3 class="sidebar-title">Technologies</h3>
                        <div class="project-tech">
                            @foreach($project->technologies as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="sidebar-card reveal">
                        <h3 class="sidebar-title">Project Info</h3>
                        <ul class="info-list">
                            <li>
                                <i class="bi bi-tag"></i>
                                <div>
                                    <strong>Category</strong><br>
                                    <small>{{ $project->category }}</small>
                                </div>
                            </li>
                            @if($project->year)
                            <li>
                                <i class="bi bi-calendar"></i>
                                <div>
                                    <strong>Year</strong><br>
                                    <small>{{ $project->year }}</small>
                                </div>
                            </li>
                            @endif
                            @if($project->role)
                            <li>
                                <i class="bi bi-person-badge"></i>
                                <div>
                                    <strong>Role</strong><br>
                                    <small>{{ $project->role }}</small>
                                </div>
                            </li>
                            @endif
                            @if($project->duration)
                            <li>
                                <i class="bi bi-clock-history"></i>
                                <div>
                                    <strong>Duration</strong><br>
                                    <small>{{ $project->duration }}</small>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>

                    @if($hasGithub || $hasDemo)
                    <div class="sidebar-card reveal">
                        <h3 class="sidebar-title">Links</h3>
                        <div class="d-grid gap-2">
                            @if($hasDemo)
                            <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="btn btn-primary">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Live Demo
                            </a>
                            @endif
                            @if($hasGithub)
                            <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">
                                <i class="bi bi-github me-1"></i> GitHub Repository
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                </aside>
            </div>

        </div>

        {{-- RELATED --}}
        @if($related->isNotEmpty())
        <div class="case-related">
            <div class="case-related-header reveal">
                <span class="section-eyebrow">More</span>
                <h2 class="case-related-title">Related Projects</h2>
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

        {{-- CTA --}}
        <div class="case-cta reveal">
            <h3 class="case-cta-title">Have a similar project in mind?</h3>
            <p class="case-cta-text">Let's discuss how I can help or contribute.</p>
            <a href="{{ route('home') }}#contact" class="btn btn-primary">
                <i class="bi bi-chat-dots me-1"></i> Let's Talk
            </a>
        </div>

    </div>
</section>

<style>
    /* ============ HERO ============ */
    .case-hero {
        padding: 32px 0 48px;
        border-bottom: 1px solid var(--border);
    }

    .case-breadcrumb {
        margin-bottom: 1.75rem;
        font-size: .9rem;
    }

    .case-hero-content {
        max-width: 760px;
        margin-bottom: 2.5rem;
    }

    .case-hero-meta {
        display: flex;
        align-items: center;
        gap: .5rem;
        margin-bottom: .75rem;
        font-size: .8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--accent);
    }

    .case-dot {
        opacity: .6;
    }

    .case-title {
        font-size: clamp(1.75rem, 4vw, 2.75rem);
        line-height: 1.15;
        margin-bottom: .75rem;
    }

    .case-lead {
        color: var(--text-2);
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
    }

    .case-meta-grid {
        display: flex;
        flex-wrap: wrap;
        gap: .75rem 2.5rem;
        padding: 1rem 0;
        margin-bottom: 1.5rem;
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .case-meta-item {
        display: flex;
        flex-direction: column;
        gap: .15rem;
    }

    .case-meta-label {
        font-size: .75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: var(--text-2);
    }

    .case-meta-value {
        font-weight: 600;
        color: var(--text-1);
    }

    .case-actions {
        display: flex;
        flex-wrap: wrap;
        gap: .75rem;
    }

    .case-cover {
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
        box-shadow: var(--shadow-md);
    }

    .case-cover img {
        width: 100%;
        height: auto;
        display: block;
        aspect-ratio: 16 / 9;
        object-fit: cover;
    }

    /* ============ CONTENT ============ */
    .case-content {
        padding: 56px 0 80px;
    }

    .case-block {
        margin-bottom: 2.5rem;
    }

    .case-block:last-child {
        margin-bottom: 0;
    }

    .case-heading {
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--text-1);
        position: relative;
        padding-bottom: .5rem;
    }

    .case-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: var(--accent);
        border-radius: 2px;
    }

    .case-body {
        color: var(--text-2);
        font-size: 1rem;
        line-height: 1.75;
    }

    .case-features {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: .6rem;
    }

    .case-features li {
        display: flex;
        align-items: flex-start;
        gap: .75rem;
        padding: .65rem .9rem;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: .95rem;
        color: var(--text-1);
    }

    .case-features li i {
        color: #10B981;
        flex-shrink: 0;
        margin-top: .15rem;
    }

    /* ============ SIDEBAR ============ */
    .case-sidebar {
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
        font-size: .85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: var(--text-2);
        margin-bottom: 1rem;
    }

    .sidebar-card .info-list li {
        padding: .5rem 0;
    }

    .sidebar-card .info-list li strong {
        font-size: .85rem;
        color: var(--text-1);
        font-weight: 600;
    }

    .sidebar-card .info-list li small {
        color: var(--text-2);
    }

    @media (max-width: 991px) {
        .case-sidebar {
            position: static;
        }
    }

    /* ============ RELATED & CTA ============ */
    .case-related {
        margin-top: 4rem;
        padding-top: 3rem;
        border-top: 1px solid var(--border);
    }

    .case-related-header {
        margin-bottom: 1.5rem;
    }

    .case-related-title {
        font-size: 1.5rem;
        margin-bottom: 0;
    }

    .case-cta {
        margin-top: 4rem;
        padding: 2.5rem 1.5rem;
        text-align: center;
        background: var(--accent-soft);
        border: 1px solid var(--border);
        border-radius: var(--radius);
    }

    .case-cta-title {
        font-size: 1.35rem;
        margin-bottom: .5rem;
    }

    .case-cta-text {
        color: var(--text-2);
        margin-bottom: 1.25rem;
    }

    /* ============ BREADCRUMB ============ */
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