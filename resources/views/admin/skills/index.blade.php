@extends('layouts.admin')

@section('title', 'Skills')
@section('page_title', 'Skills')
@section('page_subtitle', 'Kelola daftar teknologi & kemampuan')

@section('content')

    @if(session('status'))
        <div class="alert alert-success d-flex align-items-center" data-auto-dismiss>
            <i class="bi bi-check-circle me-2"></i>
            {{ session('status') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Skill Baru
        </a>
    </div>

    @if($skills->isEmpty())
        <div class="card-surface p-5 text-center">
            <i class="bi bi-lightning-charge fs-1" style="color: var(--text-2);"></i>
            <p class="mt-3 mb-3" style="color: var(--text-2);">Belum ada skill.</p>
            <a href="{{ route('admin.skills.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Skill Pertama
            </a>
        </div>
    @else
        @foreach($skills as $category => $items)
            <div class="card-surface mb-3">
                <div class="card-header">
                    <span>
                        <i class="bi bi-tag me-2"></i>
                        {{ $category }}
                        <span class="badge-soft badge-soft-primary ms-2">{{ $items->count() }}</span>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th style="width:150px;">Level</th>
                                <th style="width:80px;">Urutan</th>
                                <th style="width:140px;" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $skill)
                                <tr>
                                    <td style="font-weight:500;">
                                        {{ $skill->name }}
                                    </td>
                                    <td>
                                        @if($skill->level)
                                            <span class="badge-soft badge-soft-secondary">{{ $skill->level }}</span>
                                        @else
                                            <span style="color: var(--text-2);">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span style="color: var(--text-2);">{{ $skill->order }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('admin.skills.edit', $skill) }}"
                                               class="btn btn-sm btn-outline-secondary btn-icon"
                                               title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form method="POST"
                                                  action="{{ route('admin.skills.destroy', $skill) }}"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin hapus skill &quot;{{ $skill->name }}&quot;?');">
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
            </div>
        @endforeach
    @endif

@endsection