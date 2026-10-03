@extends('layouts.admin')

@section('title', 'Educations')
@section('page_title', 'Educations')
@section('page_subtitle', 'Kelola riwayat pendidikan')

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
                <i class="bi bi-mortarboard me-2"></i>
                Total: {{ $educations->count() }} pendidikan
            </span>
            <a href="{{ route('admin.educations.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Pendidikan Baru
            </a>
        </div>

        @if($educations->isEmpty())
            <div class="text-center py-5" style="color: var(--text-2);">
                <i class="bi bi-mortarboard fs-1 d-block mb-2"></i>
                <p class="mb-3">Belum ada data pendidikan.</p>
                <a href="{{ route('admin.educations.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Pendidikan
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Institusi</th>
                            <th>Jenjang / Jurusan</th>
                            <th style="width:140px;">Periode</th>
                            <th style="width:150px;">Status</th>
                            <th style="width:140px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($educations as $edu)
                            <tr>
                                <td>
                                    <div style="font-weight:600; color: var(--text-1);">
                                        {{ $edu->institution }}
                                    </div>
                                    @if($edu->description)
                                        <div style="font-size:.8rem; color: var(--text-2); margin-top:.15rem;">
                                            {{ Str::limit($edu->description, 60) }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if($edu->degree || $edu->major)
                                        {{ $edu->degree }}
                                        @if($edu->degree && $edu->major) — @endif
                                        {{ $edu->major }}
                                    @else
                                        <span style="color: var(--text-2);">—</span>
                                    @endif
                                </td>
                                <td>
                                    <span style="color: var(--text-2);">{{ $edu->period ?: '—' }}</span>
                                </td>
                                <td>
                                    @if($edu->status)
                                        <span class="badge-soft badge-soft-primary">{{ $edu->status }}</span>
                                    @else
                                        <span style="color: var(--text-2);">—</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.educations.edit', $edu) }}"
                                           class="btn btn-sm btn-outline-secondary btn-icon"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.educations.destroy', $edu) }}"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin hapus pendidikan &quot;{{ $edu->institution }}&quot;?');">
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