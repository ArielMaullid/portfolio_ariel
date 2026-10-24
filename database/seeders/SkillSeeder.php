<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // Reset skills (hapus semua data lama, buat ulang)
        Skill::truncate();

        $skills = [
            // Web Development
            ['name' => 'Laravel',    'category' => 'Web Development'],
            ['name' => 'PHP',        'category' => 'Web Development'],
            ['name' => 'HTML',       'category' => 'Web Development'],
            ['name' => 'CSS',        'category' => 'Web Development'],
            ['name' => 'JavaScript', 'category' => 'Web Development'],
            ['name' => 'Bootstrap',  'category' => 'Web Development'],

            // Database
            ['name' => 'MySQL',      'category' => 'Database'],
            ['name' => 'PostgreSQL', 'category' => 'Database'],

            // Tools
            ['name' => 'Git',                'category' => 'Tools'],
            ['name' => 'GitHub',             'category' => 'Tools'],
            ['name' => 'Visual Studio Code', 'category' => 'Tools'],
            ['name' => 'Laragon',            'category' => 'Tools'],

            // Machine Learning
            ['name' => 'Python',  'category' => 'Machine Learning'],
            ['name' => 'XGBoost', 'category' => 'Machine Learning'],
            ['name' => 'Flask',   'category' => 'Machine Learning'],
        ];

        foreach ($skills as $i => $skill) {
            Skill::create([
                'name'     => $skill['name'],
                'category' => $skill['category'],
                'level'    => null, // tidak menggunakan persentase / level
                'order'    => $i,
            ]);
        }
    }
}
