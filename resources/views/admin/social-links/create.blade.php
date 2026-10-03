@extends('layouts.admin')

@section('title', 'Link Baru')
@section('page_title', 'Tambah Social Link')
@section('page_subtitle', 'Tambahkan link sosial media atau kontak baru')

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.social-links.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @include('admin.social-links._form', ['link' => $link])

@endsection