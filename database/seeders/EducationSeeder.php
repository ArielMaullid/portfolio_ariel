<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::updateOrCreate(
            [
                'institution' => 'Universitas Muhammadiyah Sukabumi',
                'major'       => 'Teknik Informatika',
            ],
            [
                'degree'      => 'S1',
                'start_year'  => null,
                'end_year'    => null,
                'status'      => 'Fresh Graduate',
                'description' => 'Menempuh pendidikan S1 Teknik Informatika dengan fokus pada pengembangan aplikasi web, basis data, dan machine learning.',
            ]
        );
    }
}