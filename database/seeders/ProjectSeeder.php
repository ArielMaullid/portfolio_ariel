<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'        => 'Aplikasi Presensi Kecamatan Kadudampit Berbasis Web',
                'slug'         => 'aplikasi-presensi-kecamatan-kadudampit',
                'short_desc'   => 'Aplikasi berbasis web yang dibuat untuk membantu proses pengelolaan presensi pegawai di Kecamatan Kadudampit.',
                'description'  => 'Aplikasi berbasis web yang dibuat untuk membantu proses pengelolaan presensi pegawai.',
                'category'     => 'Web App',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Bootstrap', 'JavaScript'],
                'image'        => 'assets/images/projects/presensi-kecamatan.jpg',
                'github_url'   => null,
                'demo_url'     => null,
                'year'         => null,
                'featured'     => true,
                'order'        => 1,
            ],
            [
                'title'        => 'Sistem Klasifikasi Diagnosis Tuberculosis (TBC)',
                'slug'         => 'sistem-klasifikasi-diagnosis-tbc',
                'short_desc'   => 'Sistem klasifikasi diagnosis TBC berdasarkan faktor risiko dan gejala pasien menggunakan algoritma XGBoost.',
                'description'  => 'Sistem klasifikasi diagnosis TBC berdasarkan faktor risiko dan gejala pasien menggunakan algoritma XGBoost.',
                'category'     => 'Machine Learning',
                'technologies' => ['Python', 'XGBoost', 'Machine Learning', 'Flask', 'HTML', 'CSS', 'JavaScript'],
                'image'        => 'assets/images/projects/klasifikasi-tbc.jpg',
                'github_url'   => null,
                'demo_url'     => null,
                'year'         => null,
                'featured'     => true,
                'order'        => 2,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}