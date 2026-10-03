@extends('layouts.admin')

@section('title', 'Social Links')
@section('page_title', 'Social Links')
@section('page_subtitle', 'Kelola link sosial media & kontak')

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
                <i class="bi bi-link-45deg me-2"></i>
                Total: {{ $links->count() }} link
            </span>
            <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Link Baru
            </a>
        </div>

        @if($links->isEmpty())
            <div class="text-center py-5" style="color: var(--text-2);">
                <i class="bi bi-link-45deg fs-1 d-block mb-2"></i>
                <p class="mb-3">Belum ada social link.</p>
                <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Link Pertama
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:60px;">Icon</th>
                            <th>Platform</th>
                            <th>URL</th>
                            <th style="width:80px;">Urutan</th>
                            <th style="width:100px;">Status</th>
                            <th style="width:140px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td>
                                    @if($link->icon)
                                        <div style="width:36px; height:36px; border-radius:8px; background: var(--accent-soft); color: var(--accent); display:inline-flex; align-items:center; justify-content:center; font-size:1.1rem;">
                                            <i class="bi {{ $link->icon }}"></i>
                                        </div>
                                    @else
                                        <span style="color: var(--text-2);">—</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="font-weight:600;">{{ $link->label }}</div>
                                    <div style="font-size:.78rem; color: var(--text-2);">{{ $link->platform }}</div>
                                </td>
                                <td>
                                    <a href="{{ $link->url }}"
                                       target="_blank"
                                       rel="noopener"
                                       class="text-truncate d-inline-block"
                                       style="max-width:280px; font-size:.85rem;">
                                        {{ $link->url }}
                                    </a>
                                </td>
                                <td>
                                    <span style="color: var(--text-2);">{{ $link->order }}</span>
                                </td>
                                <td>
                                    @if($link->is_active)
                                        <span class="badge-soft badge-soft-success">Aktif</span>
                                    @else
                                        <span class="badge-soft badge-soft-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.social-links.edit', $link) }}"
                                           class="btn btn-sm btn-outline-secondary btn-icon"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.social-links.destroy', $link) }}"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin hapus link &quot;{{ $link->label }}&quot;?');">
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
        @endif
    </div>

@endsection