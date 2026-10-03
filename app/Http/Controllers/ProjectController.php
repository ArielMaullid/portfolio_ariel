<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Daftar semua project + filter kategori (opsional).
     */
    public function index(Request $request)
    {
        $category = $request->input('category');

        $projects = Project::query()
            ->when($category, fn ($q) => $q->where('category', $category))
            ->ordered()
            ->paginate(9)
            ->withQueryString();

        $categories = Project::query()
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('projects.index', [
            'projects'   => $projects,
            'categories' => $categories,
            'selected'   => $category,
        ]);
    }

    /**
     * Detail project by slug.
     */
    public function show(Project $project)
    {
        // Related projects (kategori sama, exclude diri sendiri, max 3)
        $related = Project::query()
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('projects.show', [
            'project' => $project,
            'related' => $related,
        ]);
    }
}