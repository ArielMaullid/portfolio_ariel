@php
    /** @var \App\Models\SocialLink $link */
    $isEdit = $link->exists;
    $action = $isEdit
        ? route('admin.social-links.update', $link)
        : route('admin.social-links.store');
    $method = $isEdit ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" novalidate>
    @csrf
    @if($isEdit) @method('PUT') @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong><i class="bi bi-exclamation-triangle me-1"></i>Ada error:</strong>
            <ul class="mb-0 mt-2 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card-surface">
                <div class="card-header">
                    <span><i class="bi bi-link-45deg me-2"></i>Detail Link</span>
                </div>
                <div class="card-body">

                    <div class="row g-3 mb-3">
                        <div class="col-md-5">
                            <label for="platform" class="form-label">
                                Platform <span style="color: var(--danger);">*</span>
                                <small style="color: var(--text-2); font-weight:400;">(kode unik)</small>
                            </label>
                            <input type="text"
                                   id="platform"
                                   name="platform"
                                   value="{{ old('platform', $link->platform) }}"
                                   class="form-control @error('platform') is-invalid @enderror"
                                   placeholder="github"
                                   required
                                   autofocus>
                            @error('platform')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small style="color: var(--text-2);">
                                Contoh: github, linkedin, whatsapp, email
                            </small>
                        </div>
                        <div class="col-md-7">
                            <label for="label" class="form-label">
                                Label <span style="color: var(--danger);">*</span>
                            </label>
                            <input type="text"
                                   id="label"
                                   name="label"
                                   value="{{ old('label', $link->label) }}"
                                   class="form-control @error('label') is-invalid @enderror"
                                   placeholder="GitHub"
                                   required>
                            @error('label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">
                            URL <span style="color: var(--danger);">*</span>
                        </label>
                        <input type="text"
                               id="url"
                               name="url"
                               value="{{ old('url', $link->url) }}"
                               class="form-control @error('url') is-invalid @enderror"
                               placeholder="https://github.com/username"
                               required>
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small style="color: var(--text-2);">
                            Untuk WhatsApp: <code>https://wa.me/62xxxxx?text=...</code><br>
                            Untuk Email: <code>mailto:email@example.com</code>
                        </small>
                    </div>

                    <div class="mb-0">
                        <label for="icon" class="form-label">
                            Icon Class
                            <small style="color: var(--text-2); font-weight:400;">(Bootstrap Icons)</small>
                        </label>
                        <input type="text"
                               id="icon"
                               name="icon"
                               value="{{ old('icon', $link->icon) }}"
                               class="form-control"
                               placeholder="bi-github"
                               list="iconSuggestions">
                        <datalist id="iconSuggestions">
                            <option value="bi-github">
                            <option value="bi-linkedin">
                            <option value="bi-whatsapp">
                            <option value="bi-envelope">
                            <option value="bi-twitter-x">
                            <option value="bi-instagram">
                            <option value="bi-facebook">
                            <option value="bi-youtube">
                            <option value="bi-globe">
                        </datalist>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-gear me-2"></i>Pengaturan</span>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="order" class="form-label">
                            Urutan
                            <small style="color: var(--text-2); font-weight:400;">(kecil dulu)</small>
                        </label>
                        <input type="number"
                               id="order"
                               name="order"
                               value="{{ old('order', $link->order ?? 0) }}"
                               class="form-control"
                               min="0">
                    </div>

                    <div class="form-check form-switch">
                        <input type="checkbox"
                               id="is_active"
                               name="is_active"
                               value="1"
                               class="form-check-input"
                               {{ old('is_active', $link->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">
                            Tampilkan di portfolio
                        </label>
                    </div>

                </div>
            </div>

            <div class="card-surface">
                <div class="card-body d-flex flex-column gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg me-1"></i>
                        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Link' }}
                    </button>
                    <a href="{{ route('admin.social-links.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-x-lg me-1"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>