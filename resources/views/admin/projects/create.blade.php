@extends('layouts.admin')

@section('title', 'Project Baru')
@section('page_title', 'Tambah Project')
@section('page_subtitle', 'Buat entri project baru untuk portfolio')

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    @include('admin.projects._form', ['project' => $project])

@endsection