@extends('layouts.admin')

@section('title', 'Pendidikan Baru')
@section('page_title', 'Tambah Pendidikan')
@section('page_subtitle', 'Tambahkan riwayat pendidikan baru')

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.educations.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @include('admin.educations._form', ['education' => $education])

@endsection