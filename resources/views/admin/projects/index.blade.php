@extends('layouts.admin')

@section('title', 'Projects')
@section('page_title', 'Projects')
@section('page_subtitle', 'Kelola daftar project portfolio')

@section('content')

    @if(session('status'))
        <div class="alert alert-success d-flex align-items-center" data-auto-dismiss>
            <i class="bi bi-check-circle me-2"></i>
            {{ session('status') }}
        </div>
    @endif

    <div class="card-surface">
        <div class="card-header">
            <span>
                <i class="bi bi-collection me-2"></i>
                Total: {{ $projects->total() }} project
            </span>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Project Baru
            </a>
        </div>

        @if($projects->isEmpty())
            <div class="text-center py-5" style="color: var(--text-2);">
                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                <p class="mb-3">Belum ada project.</p>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Project Pertama
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:60px;">Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th style="width:100px;">Featured</th>
                            <th style="width:120px;">Tahun</th>
                            <th style="width:180px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            @php
                                $imgPath = $project->image ? public_path($project->image) : null;
                                $imgUrl = ($imgPath && file_exists($imgPath))
                                    ? asset($project->image)
                                    : 'https://placehold.co/80x50/2563EB/FFFFFF?text=' . urlencode(mb_substr($project->title, 0, 3));
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ $imgUrl }}"
                                         alt=""
                                         style="width:56px; height:40px; object-fit:cover; border-radius:6px; border:1px solid var(--border);">
                                </td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', $project) }}"
                                       style="color: var(--text-1); font-weight:600;">
                                        {{ $project->title }}
                                    </a>
                                    <div style="font-size:.78rem; color: var(--text-2); margin-top:.15rem;">
                                        /{{ $project->slug }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-soft badge-soft-primary">{{ $project->category }}</span>
                                </td>
                                <td>
                                    <form method="POST"
                                          action="{{ route('admin.projects.toggle-featured', $project) }}"
                                          class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="btn btn-sm {{ $project->featured ? 'btn-primary' : 'btn-outline-secondary' }} btn-icon"
                                                title="{{ $project->featured ? 'Hapus dari featured' : 'Jadikan featured' }}">
                                            <i class="bi {{ $project->featured ? 'bi-star-fill' : 'bi-star' }}"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <span style="color: var(--text-2);">
                                        {{ $project->year ?? '—' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('projects.show', $project) }}"
                                           target="_blank"
                                           rel="noopener"
                                           class="btn btn-sm btn-outline-secondary btn-icon"
                                           title="Lihat publik">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}"
                                           class="btn btn-sm btn-outline-secondary btn-icon"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.projects.destroy', $project) }}"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin hapus project &quot;{{ $project->title }}&quot;? Tindakan ini tidak bisa dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger btn-icon"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($projects->hasPages())
                <div class="p-3 border-top" style="border-color: var(--border) !important;">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @endif
    </div>

    <style>
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
            margin-bottom: 0;
        }
    </style>

@endsection