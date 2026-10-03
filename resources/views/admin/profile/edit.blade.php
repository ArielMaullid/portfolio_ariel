@extends('layouts.admin')

@section('title', 'Profile')
@section('page_title', 'Profile')
@section('page_subtitle', 'Informasi utama yang tampil di portfolio')

@section('content')

    @if(session('status'))
        <div class="alert alert-success d-flex align-items-center" data-auto-dismiss>
            <i class="bi bi-check-circle me-2"></i>
            {{ session('status') }}
        </div>
    @endif

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

    <form method="POST" action="{{ route('admin.profile.update') }}" novalidate>
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-lg-8">

                <div class="card-surface mb-3">
                    <div class="card-header">
                        <span><i class="bi bi-person me-2"></i>Identitas</span>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="full_name" class="form-label">
                                Nama Lengkap <span style="color: var(--danger);">*</span>
                            </label>
                            <input type="text"
                                   id="full_name"
                                   name="full_name"
                                   value="{{ old('full_name', $profile->full_name) }}"
                                   class="form-control @error('full_name') is-invalid @enderror"
                                   required>
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="headline" class="form-label">
                                Headline <span style="color: var(--danger);">*</span>
                                <small style="color: var(--text-2); font-weight:400;">
                                    (contoh: "Fresh Graduate S1 Teknik Informatika")
                                </small>
                            </label>
                            <input type="text"
                                   id="headline"
                                   name="headline"
                                   value="{{ old('headline', $profile->headline) }}"
                                   class="form-control @error('headline') is-invalid @enderror"
                                   required>
                            @error('headline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_bio" class="form-label">
                                Bio Singkat
                                <small style="color: var(--text-2); font-weight:400;">(muncul di hero, max 1000 karakter)</small>
                            </label>
                            <textarea id="short_bio"
                                      name="short_bio"
                                      rows="3"
                                      maxlength="1000"
                                      class="form-control @error('short_bio') is-invalid @enderror">{{ old('short_bio', $profile->short_bio) }}</textarea>
                            @error('short_bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label for="about_me" class="form-label">
                                About Me
                                <small style="color: var(--text-2); font-weight:400;">(pisahkan paragraf dengan baris kosong)</small>
                            </label>
                            <textarea id="about_me"
                                      name="about_me"
                                      rows="10"
                                      class="form-control">{{ old('about_me', $profile->about_me) }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="card-surface">
                    <div class="card-header">
                        <span><i class="bi bi-mortarboard me-2"></i>Pendidikan & Lokasi</span>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text"
                                   id="location"
                                   name="location"
                                   value="{{ old('location', $profile->location) }}"
                                   class="form-control"
                                   placeholder="Sukabumi, Jawa Barat, Indonesia">
                        </div>

                        <div class="mb-3">
                            <label for="university" class="form-label">Universitas</label>
                            <input type="text"
                                   id="university"
                                   name="university"
                                   value="{{ old('university', $profile->university) }}"
                                   class="form-control"
                                   placeholder="Universitas Muhammadiyah Sukabumi">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="major" class="form-label">Program Studi</label>
                                <input type="text"
                                       id="major"
                                       name="major"
                                       value="{{ old('major', $profile->major) }}"
                                       class="form-control"
                                       placeholder="Teknik Informatika">
                            </div>
                            <div class="col-md-6">
                                <label for="graduation_status" class="form-label">Status</label>
                                <input type="text"
                                       id="graduation_status"
                                       name="graduation_status"
                                       value="{{ old('graduation_status', $profile->graduation_status) }}"
                                       class="form-control"
                                       placeholder="Fresh Graduate"
                                       list="statusSuggestions">
                                <datalist id="statusSuggestions">
                                    <option value="Fresh Graduate">
                                    <option value="Mahasiswa Aktif">
                                    <option value="Alumni">
                                </datalist>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card-surface mb-3">
                    <div class="card-header">
                        <span><i class="bi bi-image me-2"></i>Foto & CV</span>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="photo" class="form-label">
                                Path Foto
                                <small style="color: var(--text-2); font-weight:400;">(di folder public/)</small>
                            </label>
                            <input type="text"
                                   id="photo"
                                   name="photo"
                                   value="{{ old('photo', $profile->photo) }}"
                                   class="form-control"
                                   placeholder="assets/images/profile.jpg">
                            <small style="color: var(--text-2);">
                                Upload file foto manual ke <code>public/assets/images/</code> lewat VS Code.
                            </small>
                        </div>

                        <div class="mb-0">
                            <label for="cv_file" class="form-label">
                                Path CV
                                <small style="color: var(--text-2); font-weight:400;">(PDF)</small>
                            </label>
                            <input type="text"
                                   id="cv_file"
                                   name="cv_file"
                                   value="{{ old('cv_file', $profile->cv_file) }}"
                                   class="form-control"
                                   placeholder="assets/cv/ariel-maulidibillah-cv.pdf">
                            <small style="color: var(--text-2);">
                                Upload file PDF manual ke <code>public/assets/cv/</code> lewat VS Code.
                            </small>
                        </div>

                    </div>
                </div>

                <div class="card-surface">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-check-lg me-1"></i> Simpan Profile
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection