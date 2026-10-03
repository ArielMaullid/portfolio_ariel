<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Programming
            ['name' => 'PHP',        'category' => 'Programming'],
            ['name' => 'JavaScript', 'category' => 'Programming'],
            ['name' => 'HTML',       'category' => 'Programming'],
            ['name' => 'CSS',        'category' => 'Programming'],

            // Framework / Tools
            ['name' => 'Laravel',              'category' => 'Framework / Tools'],
            ['name' => 'Bootstrap',            'category' => 'Framework / Tools'],
            ['name' => 'Git',                  'category' => 'Framework / Tools'],
            ['name' => 'GitHub',               'category' => 'Framework / Tools'],
            ['name' => 'Laragon',              'category' => 'Framework / Tools'],
            ['name' => 'Visual Studio Code',   'category' => 'Framework / Tools'],

            // Database
            ['name' => 'MySQL', 'category' => 'Database'],
        ];

        foreach ($skills as $i => $skill) {
            Skill::updateOrCreate(
                [
                    'name'     => $skill['name'],
                    'category' => $skill['category'],
                ],
                [
                    'level' => null, // tidak pakai persentase / level
                    'order' => $i,
                ]
            );
        }
    }
}