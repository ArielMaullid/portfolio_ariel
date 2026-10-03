<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->orderByDesc('featured')
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create', [
            'project' => new Project(),
        ]);
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage(
                $request->file('image'),
                $data['slug'] ?? $data['title']
            );
        } else {
            $data['image'] = $data['image_path'] ?? null;
        }

        unset($data['image_path']);

        Project::create($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Hapus gambar lama kalau ada & bukan default
            $this->deleteImageIfExists($project->image);

            $data['image'] = $this->uploadImage(
                $request->file('image'),
                $data['slug'] ?? $project->slug
            );
        } elseif (! empty($data['image_path'])) {
            $this->deleteImageIfExists($project->image);
            $data['image'] = $data['image_path'];
        }

        unset($data['image_path']);

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $this->deleteImageIfExists($project->image);
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Project berhasil dihapus.');
    }

    public function toggleFeatured(Project $project)
    {
        $project->update(['featured' => ! $project->featured]);

        return back()->with('status', 'Status featured project diubah.');
    }

    /* ------------------------------------------------------------------ */
    /* Helpers                                                             */
    /* ------------------------------------------------------------------ */

    protected function uploadImage(UploadedFile $file, string $slug): string
    {
        $slugClean = \Illuminate\Support\Str::slug($slug);
        $extension = strtolower($file->getClientOriginalExtension());
        $filename  = $slugClean . '-' . time() . '.' . $extension;

        $file->move(public_path('assets/images/projects'), $filename);

        return 'assets/images/projects/' . $filename;
    }

    protected function deleteImageIfExists(?string $path): void
    {
        if (empty($path)) {
            return;
        }

        $fullPath = public_path($path);

        if (is_file($fullPath)) {
            @unlink($fullPath);
        }
    }
}