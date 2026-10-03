<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit', [
            'profile' => Profile::current(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'full_name'         => ['required', 'string', 'max:255'],
            'headline'          => ['required', 'string', 'max:255'],
            'short_bio'         => ['nullable', 'string', 'max:1000'],
            'about_me'          => ['nullable', 'string'],
            'photo'             => ['nullable', 'string', 'max:255'],
            'cv_file'           => ['nullable', 'string', 'max:255'],
            'location'          => ['nullable', 'string', 'max:255'],
            'university'        => ['nullable', 'string', 'max:255'],
            'major'             => ['nullable', 'string', 'max:255'],
            'graduation_status' => ['nullable', 'string', 'max:100'],
        ]);

        Profile::updateOrCreate(['id' => 1], $validated);

        return redirect()
            ->route('admin.profile.edit')
            ->with('status', 'Profile berhasil diperbarui.');
    }
}