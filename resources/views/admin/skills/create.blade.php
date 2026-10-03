@extends('layouts.admin')

@section('title', 'Skill Baru')
@section('page_title', 'Tambah Skill')
@section('page_subtitle', 'Tambahkan skill baru ke portfolio')

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.skills.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @include('admin.skills._form', ['skill' => $skill, 'categories' => $categories])

@endsection