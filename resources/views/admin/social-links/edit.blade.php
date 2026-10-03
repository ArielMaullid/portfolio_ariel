@extends('layouts.admin')

@section('title', 'Edit Link')
@section('page_title', 'Edit Social Link')
@section('page_subtitle', $link->label)

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.social-links.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @include('admin.social-links._form', ['link' => $link])

@endsection