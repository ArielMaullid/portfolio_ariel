@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page_title', 'Edit Project')
@section('page_subtitle', $project->title)

@section('content')

    <div class="mb-3 d-flex flex-wrap gap-2">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
        <a href="{{ route('projects.show', $project) }}"
           target="_blank"
           rel="noopener"
           class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Publik
        </a>
    </div>

    @include('admin.projects._form', ['project' => $project])

@endsection