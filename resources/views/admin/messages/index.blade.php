@extends('layouts.admin')

@section('title', 'Messages')
@section('page_title', 'Messages')
@section('page_subtitle', 'Pesan dari contact form')

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
                <i class="bi bi-envelope me-2"></i>
                Total: {{ $messages->total() }} pesan
            </span>
        </div>

        @if($messages->isEmpty())
            <div class="text-center py-5" style="color: var(--text-2);">
                <i class="bi bi-chat-dots fs-1 d-block mb-2"></i>
                <p class="mb-0">Belum ada pesan masuk.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:50px;"></th>
                            <th>Pengirim</th>
                            <th>Subject</th>
                            <th style="width:170px;">Tanggal</th>
                            <th style="width:140px;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr style="{{ $message->is_read ? '' : 'background: var(--accent-soft);' }}">
                                <td>
                                    @if(!$message->is_read)
                                        <span title="Belum dibaca" style="display:inline-block; width:8px; height:8px; border-radius:50%; background: var(--accent);"></span>
                                    @else
                                        <i class="bi bi-check2" style="color: var(--text-2);"></i>
                                    @endif
                                </td>
                                <td>
                                    <div style="font-weight:600;">{{ $message->name }}</div>
                                    <div style="font-size:.78rem; color: var(--text-2);">{{ $message->email }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.messages.show', $message) }}"
                                       style="color: var(--text-1); font-weight: {{ $message->is_read ? '400' : '600' }};">
                                        {{ Str::limit($message->subject, 60) }}
                                    </a>
                                </td>
                                <td>
                                    <span style="color: var(--text-2); font-size:.85rem;">
                                        {{ $message->created_at->format('d M Y H:i') }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.messages.show', $message) }}"
                                           class="btn btn-sm btn-outline-secondary btn-icon"
                                           title="Baca">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.messages.destroy', $message) }}"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin hapus pesan dari &quot;{{ $message->name }}&quot;?');">
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

            @if($messages->hasPages())
                <div class="p-3 border-top" style="border-color: var(--border) !important;">
                    {{ $messages->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @endif
    </div>

@endsection