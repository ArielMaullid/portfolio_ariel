@php
    /** @var \App\Models\Skill $skill */
    $isEdit = $skill->exists;
    $action = $isEdit
        ? route('admin.skills.update', $skill)
        : route('admin.skills.store');
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
                    <span><i class="bi bi-lightning-charge me-2"></i>Detail Skill</span>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Skill <span style="color: var(--danger);">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name', $skill->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Contoh: Laravel"
                               required
                               autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">
                            Kategori <span style="color: var(--danger);">*</span>
                        </label>
                        <input type="text"
                               id="category"
                               name="category"
                               value="{{ old('category', $skill->category) }}"
                               class="form-control @error('category') is-invalid @enderror"
                               placeholder="Programming / Database / ..."
                               list="skillCategories"
                               required>
                        <datalist id="skillCategories">
                            @foreach(($categories ?? []) as $cat)
                                <option value="{{ $cat }}">
                            @endforeach
                        </datalist>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <label for="level" class="form-label">
                            Level
                            <small style="color: var(--text-2); font-weight:400;">(opsional)</small>
                        </label>
                        <select id="level" name="level" class="form-select @error('level') is-invalid @enderror">
                            <option value="">— Tidak ada level —</option>
                            <option value="Familiar"     {{ old('level', $skill->level) === 'Familiar' ? 'selected' : '' }}>Familiar</option>
                            <option value="Intermediate" {{ old('level', $skill->level) === 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Experienced"  {{ old('level', $skill->level) === 'Experienced' ? 'selected' : '' }}>Experienced</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">
                            Urutan
                            <small style="color: var(--text-2); font-weight:400;">(kecil dulu)</small>
                        </label>
                        <input type="number"
                               id="order"
                               name="order"
                               value="{{ old('order', $skill->order ?? 0) }}"
                               class="form-control"
                               min="0">
                    </div>

                    <div class="mb-0">
                        <label for="icon" class="form-label">
                            Icon
                            <small style="color: var(--text-2); font-weight:400;">(opsional)</small>
                        </label>
                        <input type="text"
                               id="icon"
                               name="icon"
                               value="{{ old('icon', $skill->icon) }}"
                               class="form-control"
                               placeholder="bi-code-slash">
                        <small style="color: var(--text-2);">
                            Bootstrap Icons class. Contoh: <code>bi-code-slash</code>
                        </small>
                    </div>

                </div>
            </div>

            <div class="card-surface">
                <div class="card-body d-flex flex-column gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg me-1"></i>
                        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Skill' }}
                    </button>
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-x-lg me-1"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>