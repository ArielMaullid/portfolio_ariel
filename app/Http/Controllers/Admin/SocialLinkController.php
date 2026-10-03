<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink::query()->orderBy('order')->get();

        return view('admin.social-links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.social-links.create', [
            'link' => new SocialLink(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);
        SocialLink::create($validated);

        return redirect()
            ->route('admin.social-links.index')
            ->with('status', 'Social link berhasil ditambahkan.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social-links.edit', [
            'link' => $socialLink,
        ]);
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $this->validateData($request);
        $socialLink->update($validated);

        return redirect()
            ->route('admin.social-links.index')
            ->with('status', 'Social link berhasil diperbarui.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()
            ->route('admin.social-links.index')
            ->with('status', 'Social link berhasil dihapus.');
    }

    protected function validateData(Request $request): array
    {
        $data = $request->validate([
            'platform'  => ['required', 'string', 'max:100'],
            'label'     => ['required', 'string', 'max:100'],
            'url'       => ['required', 'string', 'max:500'],
            'icon'      => ['nullable', 'string', 'max:100'],
            'order'     => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}