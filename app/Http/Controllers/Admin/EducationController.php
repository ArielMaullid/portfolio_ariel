<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::query()
            ->orderByDesc('end_year')
            ->orderByDesc('start_year')
            ->get();

        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create', [
            'education' => new Education(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);
        Education::create($validated);

        return redirect()
            ->route('admin.educations.index')
            ->with('status', 'Pendidikan berhasil ditambahkan.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $this->validateData($request);
        $education->update($validated);

        return redirect()
            ->route('admin.educations.index')
            ->with('status', 'Pendidikan berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()
            ->route('admin.educations.index')
            ->with('status', 'Pendidikan berhasil dihapus.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'institution' => ['required', 'string', 'max:255'],
            'degree'      => ['nullable', 'string', 'max:255'],
            'major'       => ['nullable', 'string', 'max:255'],
            'start_year'  => ['nullable', 'integer', 'min:1950', 'max:2100'],
            'end_year'    => ['nullable', 'integer', 'min:1950', 'max:2100', 'gte:start_year'],
            'status'      => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);
    }
}