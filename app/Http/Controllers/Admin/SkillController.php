<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get()->groupBy('category');

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create', [
            'skill'      => new Skill(),
            'categories' => $this->knownCategories(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'level'    => ['nullable', 'string', 'in:Familiar,Intermediate,Experienced'],
            'icon'     => ['nullable', 'string', 'max:255'],
            'order'    => ['nullable', 'integer', 'min:0'],
        ]);

        Skill::create($validated);

        return redirect()
            ->route('admin.skills.index')
            ->with('status', 'Skill berhasil ditambahkan.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', [
            'skill'      => $skill,
            'categories' => $this->knownCategories(),
        ]);
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'level'    => ['nullable', 'string', 'in:Familiar,Intermediate,Experienced'],
            'icon'     => ['nullable', 'string', 'max:255'],
            'order'    => ['nullable', 'integer', 'min:0'],
        ]);

        $skill->update($validated);

        return redirect()
            ->route('admin.skills.index')
            ->with('status', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('admin.skills.index')
            ->with('status', 'Skill berhasil dihapus.');
    }

    protected function knownCategories(): array
    {
        return [
            'Programming',
            'Framework / Tools',
            'Database',
            'Soft Skills',
            'Lainnya',
        ];
    }
}