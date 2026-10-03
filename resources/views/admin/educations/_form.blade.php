@php
    /** @var \App\Models\Education $education */
    $isEdit = $education->exists;
    $action = $isEdit
        ? route('admin.educations.update', $education)
        : route('admin.educations.store');
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
                    <span><i class="bi bi-mortarboard me-2"></i>Detail Pendidikan</span>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="institution" class="form-label">
                            Nama Institusi <span style="color: var(--danger);">*</span>
                        </label>
                        <input type="text"
                               id="institution"
                               name="institution"
                               value="{{ old('institution', $education->institution) }}"
                               class="form-control @error('institution') is-invalid @enderror"
                               placeholder="Contoh: Universitas Muhammadiyah Sukabumi"
                               required
                               autofocus>
                        @error('institution')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="degree" class="form-label">Jenjang</label>
                            <input type="text"
                                   id="degree"
                                   name="degree"
                                   value="{{ old('degree', $education->degree) }}"
                                   class="form-control"
                                   placeholder="S1"
                                   list="degreeSuggestions">
                            <datalist id="degreeSuggestions">
                                <option value="SMA/SMK">
                                <option value="D3">
                                <option value="D4">
                                <option value="S1">
                                <option value="S2">
                                <option value="S3">
                            </datalist>
                        </div>
                        <div class="col-md-8">
                            <label for="major" class="form-label">Jurusan / Program Studi</label>
                            <input type="text"
                                   id="major"
                                   name="major"
                                   value="{{ old('major', $education->major) }}"
                                   class="form-control"
                                   placeholder="Teknik Informatika">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea id="description"
                                  name="description"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Keterangan tambahan tentang pendidikan ini.">{{ old('description', $education->description) }}</textarea>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-calendar me-2"></i>Periode</span>
                </div>
                <div class="card-body">

                    <div class="row g-2">
                        <div class="col-6">
                            <label for="start_year" class="form-label">Tahun Mulai</label>
                            <input type="number"
                                   id="start_year"
                                   name="start_year"
                                   value="{{ old('start_year', $education->start_year) }}"
                                   class="form-control @error('start_year') is-invalid @enderror"
                                   placeholder="2020"
                                   min="1950"
                                   max="2100">
                            @error('start_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="end_year" class="form-label">Tahun Selesai</label>
                            <input type="number"
                                   id="end_year"
                                   name="end_year"
                                   value="{{ old('end_year', $education->end_year) }}"
                                   class="form-control @error('end_year') is-invalid @enderror"
                                   placeholder="2024"
                                   min="1950"
                                   max="2100">
                            @error('end_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <small style="color: var(--text-2);">
                        Kosongkan <strong>Tahun Selesai</strong> jika masih berlangsung.
                    </small>

                </div>
            </div>

            <div class="card-surface mb-3">
                <div class="card-header">
                    <span><i class="bi bi-patch-check me-2"></i>Status</span>
                </div>
                <div class="card-body">
                    <label for="status" class="form-label">Status Pendidikan</label>
                    <input type="text"
                           id="status"
                           name="status"
                           value="{{ old('status', $education->status) }}"
                           class="form-control"
                           placeholder="Fresh Graduate / Ongoing"
                           list="statusSuggestions">
                    <datalist id="statusSuggestions">
                        <option value="Ongoing">
                        <option value="Fresh Graduate">
                        <option value="Lulus">
                        <option value="Drop Out">
                    </datalist>
                </div>
            </div>

            <div class="card-surface">
                <div class="card-body d-flex flex-column gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-lg me-1"></i>
                        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Pendidikan' }}
                    </button>
                    <a href="{{ route('admin.educations.index') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-x-lg me-1"></i> Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>