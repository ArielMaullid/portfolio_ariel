<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email    = config('portfolio.admin.email');
        $password = config('portfolio.admin.password');
        $name     = config('portfolio.admin.name');

        if (empty($email) || empty($password)) {
            $this->command->warn('ADMIN_EMAIL / ADMIN_PASSWORD kosong di .env, seeder dilewati.');
            return;
        }

        // firstOrCreate: hanya membuat admin kalau belum ada.
        // Password yang sudah diganti lewat /password/change tidak ditimpa.
        // Cast 'hashed' di model User otomatis meng-hash password.
        $user = User::firstOrCreate(
            ['email' => $email],
            ['name' => $name, 'password' => $password]
        );

        $this->command->info(
            $user->wasRecentlyCreated
                ? "Admin user dibuat: {$email}"
                : "Admin user sudah ada, password tidak diubah: {$email}"
        );
    }
}