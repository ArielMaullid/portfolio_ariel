@extends('layouts.admin')

@section('title', 'Baca Pesan')
@section('page_title', 'Baca Pesan')
@section('page_subtitle', $message->subject)

@section('content')

    <div class="mb-3">
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card-surface">
                <div class="card-header">
                    <span><i class="bi bi-envelope-open me-2"></i>Pesan</span>
                    <small style="color: var(--text-2); font-weight:400;">
                        {{ $message->created_at->format('d M Y, H:i') }}
                    </small>
                </div>
                <div class="card-body">

                    <h3 style="font-size:1.15rem; margin-bottom:1rem; color: var(--text-1);">
                        {{ $message->subject }}
                    </h3>

                    <div style="color: var(--text-2); line-height:1.75; white-space: pre-wrap;">{{ $message->message }}</div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-person me-2"></i>Pengirim</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small style="color: var(--text-2); text-transform:uppercase; font-size:.72rem; letter-spacing:.04em;">Nama</small>
                        <div style="font-weight:600;">{{ $message->name }}</div>
                    </div>
                    <div class="mb-3">
                        <small style="color: var(--text-2); text-transform:uppercase; font-size:.72rem; letter-spacing:.04em;">Email</small>
                        <div>
                            <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                        </div>
                    </div>
                    @if($message->ip_address)
                        <div class="mb-0">
                            <small style="color: var(--text-2); text-transform:uppercase; font-size:.72rem; letter-spacing:.04em;">IP Address</small>
                            <div style="font-family: monospace; font-size:.85rem; color: var(--text-2);">
                                {{ $message->ip_address }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-surface">
                <div class="card-body d-grid gap-2">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}"
                       class="btn btn-primary">
                        <i class="bi bi-reply me-1"></i> Balas via Email
                    </a>
                    <form method="POST"
                          action="{{ route('admin.messages.destroy', $message) }}"
                          onsubmit="return confirm('Yakin hapus pesan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="bi bi-trash me-1"></i> Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection