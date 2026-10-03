@extends('layouts.admin')

@section('title', 'Edit Pendidikan')
@section('page_title', 'Edit Pendidikan')
@section('page_subtitle', $education->institution)

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.educations.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @include('admin.educations._form', ['education' => $education])

@endsection