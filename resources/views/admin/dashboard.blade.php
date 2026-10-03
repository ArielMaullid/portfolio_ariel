@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan portfolio Anda')

@section('content')

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card-surface stat-card">
                <div class="stat-icon" style="background: var(--accent-soft); color: var(--accent);">
                    <i class="bi bi-collection"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['projects'] }}</div>
                    <div class="stat-label">Total Projects</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card-surface stat-card">
                <div class="stat-icon" style="background: rgba(16,185,129,.12); color: var(--success);">
                    <i class="bi bi-star"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['featured'] }}</div>
                    <div class="stat-label">Featured</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card-surface stat-card">
                <div class="stat-icon" style="background: rgba(245,158,11,.15); color: #D97706;">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['skills'] }}</div>
                    <div class="stat-label">Skills</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card-surface stat-card">
                <div class="stat-icon" style="background: rgba(239,68,68,.12); color: var(--danger);">
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <div class="stat-value">{{ $stats['unread_messages'] }}</div>
                    <div class="stat-label">Pesan Belum Dibaca</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">

        {{-- Latest Projects --}}
        <div class="col-lg-7">
            <div class="card-surface h-100">
                <div class="card-header">
                    <span><i class="bi bi-collection me-2"></i>Project Terbaru</span>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    @if($latestProjects->isEmpty())
                        <div class="text-center py-5" style="color: var(--text-2);">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            Belum ada project.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Featured</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestProjects as $project)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.projects.edit', $project) }}"
                                                   style="color: var(--text-1); font-weight: 500;">
                                                    {{ Str::limit($project->title, 45) }}
                                                </a>
                                                <div style="font-size:.78rem; color: var(--text-2);">
                                                    /{{ $project->slug }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge-soft badge-soft-primary">{{ $project->category }}</span>
                                            </td>
                                            <td>
                                                @if($project->featured)
                                                    <span class="badge-soft badge-soft-success">
                                                        <i class="bi bi-star-fill"></i> Ya
                                                    </span>
                                                @else
                                                    <span class="badge-soft badge-soft-secondary">Tidak</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('projects.show', $project) }}"
                                                   target="_blank"
                                                   class="btn btn-sm btn-outline-secondary btn-icon"
                                                   title="Lihat di publik">
                                                    <i class="bi bi-box-arrow-up-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Latest Messages --}}
        <div class="col-lg-5">
            <div class="card-surface h-100">
                <div class="card-header">
                    <span><i class="bi bi-envelope me-2"></i>Pesan Terbaru</span>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">
                        Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    @if($latestMessages->isEmpty())
                        <div class="text-center py-5" style="color: var(--text-2);">
                            <i class="bi bi-chat-dots fs-2 d-block mb-2"></i>
                            Belum ada pesan masuk.
                        </div>
                    @else
                        <div class="p-3">
                            @foreach($latestMessages as $message)
                                <a href="{{ route('admin.messages.show', $message) }}"
                                   class="d-block p-3 mb-2 rounded text-decoration-none"
                                   style="background: {{ $message->is_read ? 'transparent' : 'var(--accent-soft)' }};
                                          border: 1px solid var(--border); color: inherit;">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <strong style="font-size:.9rem;">{{ $message->name }}</strong>
                                        <small style="color: var(--text-2); font-size:.72rem;">
                                            {{ $message->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <div style="font-size:.85rem; color: var(--text-2);" class="text-truncate">
                                        {{ $message->subject }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

@endsection