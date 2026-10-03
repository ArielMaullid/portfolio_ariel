@extends('layouts.app')

@section('title', 'Projects — ' . config('portfolio.name'))
@section('meta_description', 'Kumpulan project yang pernah dikerjakan oleh ' . config('portfolio.name') . '.')

@section('content')

<section class="section" style="padding-top: 48px;">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4 reveal">
            <div>
                <span class="section-eyebrow">Portfolio</span>
                <h1 class="section-title mb-1">All Projects</h1>
                <p class="section-subtitle mb-0">
                    Kumpulan project yang pernah saya kerjakan selama perkuliahan dan pengembangan mandiri.
                </p>
            </div>
            <a href="{{ route('home') }}#projects" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        {{-- Filter Kategori --}}
        @if($categories->isNotEmpty())
            <div class="filter-bar reveal">
                <a href="{{ route('projects.index') }}"
                   class="filter-btn {{ !$selected ? 'active' : '' }}">
                    Semua
                    <span class="filter-count">{{ $projects->total() }}</span>
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('projects.index', ['category' => $cat]) }}"
                       class="filter-btn {{ $selected === $cat ? 'active' : '' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        @endif

        {{-- Grid Projects --}}
        @if($projects->isEmpty())
            <div class="card-surface p-5 text-center reveal">
                <i class="bi bi-inbox fs-1 text-muted-2"></i>
                <h3 class="h5 mt-3 mb-2">Belum ada project</h3>
                <p class="text-muted-2 mb-0">
                    @if($selected)
                        Tidak ada project dengan kategori <strong>{{ $selected }}</strong>.
                        <a href="{{ route('projects.index') }}">Lihat semua project</a>.
                    @else
                        Project akan segera ditambahkan.
                    @endif
                </p>
            </div>
        @else
            <div class="row g-4">
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <x-project-card :project="$project" />
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($projects->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @endif

    </div>
</section>

{{-- CSS khusus halaman ini --}}
<style>
    .filter-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border);
    }
    .filter-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.9rem;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 999px;
        font-size: 0.9rem;
        color: var(--text-2);
        font-weight: 500;
        transition: all 0.15s ease;
    }
    .filter-btn:hover {
        border-color: var(--accent);
        color: var(--accent);
    }
    .filter-btn.active {
        background: var(--accent);
        border-color: var(--accent);
        color: #fff;
    }
    .filter-btn.active:hover {
        color: #fff;
    }
    .filter-count {
        background: rgba(255,255,255,0.2);
        padding: 0.05rem 0.45rem;
        border-radius: 999px;
        font-size: 0.75rem;
    }
    .filter-btn:not(.active) .filter-count {
        background: var(--accent-soft);
        color: var(--accent);
    }

    /* Pagination override */
    .pagination {
        --bs-pagination-color: var(--text-2);
        --bs-pagination-bg: var(--surface);
        --bs-pagination-border-color: var(--border);
        --bs-pagination-hover-color: var(--accent);
        --bs-pagination-hover-bg: var(--accent-soft);
        --bs-pagination-hover-border-color: var(--accent);
        --bs-pagination-active-bg: var(--accent);
        --bs-pagination-active-border-color: var(--accent);
        --bs-pagination-disabled-color: var(--text-2);
        --bs-pagination-disabled-bg: var(--surface);
        --bs-pagination-disabled-border-color: var(--border);
    }
</style>

@endsection