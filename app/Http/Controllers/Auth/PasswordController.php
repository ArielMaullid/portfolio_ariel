<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::min(12)],
        ]);

        // Cast 'hashed' di model User otomatis meng-hash password
        $request->user()->update(['password' => $validated['password']]);

        return back()->with('status', 'Password berhasil diubah.');
    }
}