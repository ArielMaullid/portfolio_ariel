@php
    /** @var \App\Models\Project $project */
    $isEdit = $project->exists;
    $action = $isEdit
        ? route('admin.projects.update', $project)
        : route('admin.projects.store');
    $method = $isEdit ? 'PUT' : 'POST';

    // Pre-fill form values
    $techValue  = old('technologies', $project->technologies ?? []);
    $techString = is_array($techValue) ? implode(', ', $techValue) : $techValue;

    $featValue  = old('features', $project->features ?? []);
    $featString = is_array($featValue) ? implode("\n", $featValue) : $featValue;

    $currentImage = $project->image ?? null;
    $imageExists  = $currentImage && file_exists(public_path($currentImage));
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" novalidate>
    @csrf
    @if($isEdit) @method('PUT') @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong><i class="bi bi-exclamation-triangle me-1"></i>Ada error pada form:</strong>
            <ul class="mb-0 mt-2 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-3">

        {{-- KIRI: Kolom utama --}}
        <div class="col-lg-8">

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-info-circle me-2"></i>Informasi Utama</span>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Judul Project <span style="color: var(--danger);">*</span>
                        </label>
                        <input type="text"
                               id="title"
                               name="title"
                               value="{{ old('title', $project->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Contoh: Aplikasi Presensi Kecamatan"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">
                            Slug
                            <small style="color: var(--text-2); font-weight:400;">
                                (kosongkan untuk auto-generate dari judul)
                            </small>
                        </label>
                        <input type="text"
                               id="slug"
                               name="slug"
                               value="{{ old('slug', $project->slug) }}"
                               class="form-control @error('slug') is-invalid @enderror"
                               placeholder="contoh-slug-project">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small style="color: var(--text-2);">
                            URL publik: <code>/projects/<span id="slugPreview">{{ $project->slug ?: 'slug-anda' }}</span></code>
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="short_desc" class="form-label">
                            Deskripsi Singkat <span style="color: var(--danger);">*</span>
                            <small style="color: var(--text-2); font-weight:400;">(max 500 karakter)</small>
                        </label>
                        <textarea id="short_desc"
                                  name="short_desc"
                                  rows="2"
                                  maxlength="500"
                                  class="form-control @error('short_desc') is-invalid @enderror"
                                  placeholder="Ringkasan 1-2 kalimat yang muncul di card project."
                                  required>{{ old('short_desc', $project->short_desc) }}</textarea>
                        @error('short_desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Detail</label>
                        <textarea id="description"
                                  name="description"
                                  rows="4"
                                  class="form-control"
                                  placeholder="Penjelasan lengkap tentang project.">{{ old('description', $project->description) }}</textarea>
                    </div>

                </div>
            </div>

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-file-text me-2"></i>Detail Naratif</span>
                    <small style="color: var(--text-2); font-weight:400;">(opsional)</small>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="background" class="form-label">Latar Belakang / Masalah</label>
                        <textarea id="background"
                                  name="background"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Kenapa project ini dibuat? Masalah apa yang diselesaikan?">{{ old('background', $project->background) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="objective" class="form-label">Tujuan</label>
                        <textarea id="objective"
                                  name="objective"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Apa tujuan utama project ini?">{{ old('objective', $project->objective) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="features" class="form-label">
                            Fitur Utama
                            <small style="color: var(--text-2); font-weight:400;">(satu fitur per baris)</small>
                        </label>
                        <textarea id="features"
                                  name="features"
                                  rows="5"
                                  class="form-control @error('features') is-invalid @enderror"
                                  placeholder="Login multi-role&#10;Manajemen data pegawai&#10;Laporan presensi bulanan">{{ $featString }}</textarea>
                        @error('features')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contribution" class="form-label">Kontribusi Saya</label>
                        <textarea id="contribution"
                                  name="contribution"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Apa yang Anda kerjakan di project ini?">{{ old('contribution', $project->contribution) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="development" class="form-label">Proses Pengembangan</label>
                        <textarea id="development"
                                  name="development"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Bagaimana project ini dikerjakan?">{{ old('development', $project->development) }}</textarea>
                    </div>

                    <div class="mb-0">
                        <label for="result" class="form-label">Hasil</label>
                        <textarea id="result"
                                  name="result"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Apa hasil akhirnya?">{{ old('result', $project->result) }}</textarea>
                    </div>

                </div>
            </div>

        </div>

        {{-- KANAN: Sidebar meta --}}
        <div class="col-lg-4">

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-gear me-2"></i>Pengaturan</span>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="category" class="form-label">
                            Kategori <span style="color: var(--danger);">*</span>
                        </label>
                        <input type="text"
                               id="category"
                               name="category"
                               value="{{ old('category', $project->category) }}"
                               class="form-control @error('category') is-invalid @enderror"
                               placeholder="Web App / Machine Learning / ..."
                               list="categorySuggestions"
                               required>
                        <datalist id="categorySuggestions">
                            <option value="Web App">
                            <option value="Mobile App">
                            <option value="Machine Learning">
                            <option value="Desktop App">
                            <option value="Website">
                            <option value="Lainnya">
                        </datalist>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <input type="number"
                               id="year"
                               name="year"
                               value="{{ old('year', $project->year) }}"
                               class="form-control @error('year') is-invalid @enderror"
                               placeholder="{{ date('Y') }}"
                               min="1990"
                               max="2100">
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">
                            Urutan
                            <small style="color: var(--text-2); font-weight:400;">(angka kecil tampil dulu)</small>
                        </label>
                        <input type="number"
                               id="order"
                               name="order"
                               value="{{ old('order', $project->order ?? 0) }}"
                               class="form-control"
                               min="0">
                    </div>

                    <div class="form-check form-switch">
                        <input type="checkbox"
                               id="featured"
                               name="featured"
                               value="1"
                               class="form-check-input"
                               {{ old('featured', $project->featured) ? 'checked' : '' }}>
                        <label for="featured" class="form-check-label">
                            Tampilkan sebagai <strong>Featured</strong>
                        </label>
                    </div>

                </div>
            </div>

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-code-slash me-2"></i>Teknologi</span>
                </div>
                <div class="card-body">
                    <label for="technologies" class="form-label">
                        Daftar Teknologi <span style="color: var(--danger);">*</span>
                        <small style="color: var(--text-2); font-weight:400;">(pisahkan dengan koma)</small>
                    </label>
                    <textarea id="technologies"
                              name="technologies"
                              rows="3"
                              class="form-control @error('technologies') is-invalid @enderror"
                              placeholder="Laravel, PHP, MySQL, Bootstrap"
                              required>{{ $techString }}</textarea>
                    @error('technologies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small style="color: var(--text-2);">
                        Contoh: <code>Laravel, PHP, MySQL</code>
                    </small>
                </div>
            </div>

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-image me-2"></i>Thumbnail</span>
                </div>
                <div class="card-body">
                    @if($imageExists)
                        <div class="mb-2">
                            <img src="{{ asset($currentImage) }}"
                                 alt="Thumbnail saat ini"
                                 class="w-100"
                                 style="border-radius:8px; border:1px solid var(--border); aspect-ratio:16/10; object-fit:cover;">
                        </div>
                        <input type="hidden" name="image_path" value="{{ $currentImage }}">
                        <small style="color: var(--text-2);">
                            <i class="bi bi-info-circle"></i>
                            Upload gambar baru untuk mengganti.
                        </small>
                    @else
                        <div class="mb-2 text-center p-3"
                             style="background: var(--surface-2); border-radius:8px; border:1px dashed var(--border); color: var(--text-2); font-size:.85rem;">
                            <i class="bi bi-image fs-3 d-block mb-1"></i>
                            Belum ada gambar
                        </div>
                    @endif

                    <input type="file"
                           id="image"
                           name="image"
                           class="form-control mt-2 @error('image') is-invalid @enderror"
                           accept="image/jpeg,image/jpg,image/png,image/webp">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small style="color: var(--text-2);">
                        Format: JPG, PNG, WEBP. Max 2 MB.
                    </small>
                </div>
            </div>

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-link-45deg me-2"></i>Link</span>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="github_url" class="form-label">GitHub Repository</label>
                        <input type="url"
                               id="github_url"
                               name="github_url"
                               value="{{ old('github_url', $project->github_url) }}"
                               class="form-control @error('github_url') is-invalid @enderror"
                               placeholder="https://github.com/username/repo">
                        @error('github_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="demo_url" class="form-label">Live Demo</label>
                        <input type="url"
                               id="demo_url"
                               name="demo_url"
                               value="{{ old('demo_url', $project->demo_url) }}"
                               class="form-control @error('demo_url') is-invalid @enderror"
                               placeholder="https://demo.example.com">
                        @error('demo_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Actions --}}
            <div class="card-surface">
                <div class="card-body d-flex flex-column gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg me-1"></i>
                        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Project' }}
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-x-lg me-1"></i> Batal
                    </a>
                </div>
            </div>

        </div>

    </div>

</form>

@push('scripts')
<script>
    // Auto-generate slug preview saat title diisi
    (function () {
        const titleInput = document.getElementById('title');
        const slugInput  = document.getElementById('slug');
        const preview    = document.getElementById('slugPreview');
        if (!titleInput || !preview) return;

        const slugify = (str) => str
            .toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        const update = () => {
            const val = slugInput.value.trim() || slugify(titleInput.value);
            preview.textContent = val || 'slug-anda';
        };

        titleInput.addEventListener('input', update);
        slugInput.addEventListener('input', update);
        update();
    })();

    // Auto-slugify saat user ketik di field slug (kalau kosong saat save, biar backend generate)
    (function () {
        const slugInput = document.getElementById('slug');
        if (!slugInput) return;
        slugInput.addEventListener('blur', function () {
            this.value = this.value
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^a-z0-9-]/g, '')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        });
    })();
</script>
@endpush