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
                'background'   => 'Proses presensi pegawai di Kecamatan Kadudampit masih dilakukan secara manual, sehingga pencatatan dan pengelolaan data presensi memerlukan pendekatan yang lebih terstruktur.',
                'objective'    => 'Menghasilkan aplikasi presensi berbasis web yang membantu proses pencatatan dan pengelolaan data kehadiran pegawai secara lebih terstruktur.',
                'contribution' => 'Merancang dan membangun aplikasi sebagai Full Stack Web Developer, mulai dari perancangan database, pengembangan backend dan frontend, hingga implementasi fitur utama.',
                'features'     => [
                    'Login / Authentication',
                    'Pengelolaan data karyawan',
                    'Presensi pegawai',
                    'Pengajuan izin',
                    'Dashboard',
                    'Pengelolaan data presensi',
                ],
                'result'       => 'Berhasil menghasilkan aplikasi presensi berbasis web yang dapat digunakan untuk membantu pengelolaan data karyawan dan presensi.',
                'category'     => 'Web App',
                'role'         => 'Full Stack Web Developer',
                'duration'     => '3 Months',
                'challenges'   => 'Memahami alur sistem presensi dan mengintegrasikan fitur login, data karyawan, serta pencatatan kehadiran.',
                'reflection'   => 'Project ini membantu saya memahami proses pengembangan aplikasi web secara langsung, mulai dari perancangan hingga implementasi.',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Bootstrap', 'JavaScript'],
                'image'        => 'assets/images/projects/presensi-kecamatan.jpg',
                'github_url'   => 'https://github.com/ArielMaullid/KerjaPraktik.git',
                'demo_url'     => null,
                'year'         => 2025,
                'featured'     => true,
                'order'        => 1,
            ],
            [
                'title'        => 'Sistem Klasifikasi Diagnosis Tuberculosis (TBC)',
                'slug'         => 'sistem-klasifikasi-diagnosis-tbc',
                'short_desc'   => 'Sistem klasifikasi diagnosis TBC berdasarkan faktor risiko dan gejala pasien menggunakan algoritma XGBoost.',
                'description'  => 'Sistem klasifikasi diagnosis TBC berdasarkan faktor risiko dan gejala pasien menggunakan algoritma XGBoost.',
                'background'   => 'Diagnosis TBC memerlukan analisis faktor risiko dan gejala pasien yang kompleks. Pendekatan machine learning dapat membantu proses klasifikasi secara konsisten.',
                'objective'    => 'Membangun model klasifikasi diagnosis TBC berdasarkan faktor risiko dan gejala pasien, serta mengimplementasikannya dalam aplikasi berbasis web.',
                'contribution' => 'Merancang dan mengembangkan model machine learning menggunakan XGBoost, melakukan evaluasi model, serta membangun aplikasi web berbasis Flask untuk implementasi model.',
                'features'     => [
                    'Input faktor risiko dan gejala pasien',
                    'Klasifikasi diagnosis menggunakan model XGBoost',
                    'Antarmuka web berbasis Flask',
                    'Menampilkan hasil klasifikasi',
                ],
                'result'       => 'Menghasilkan model klasifikasi dengan accuracy 89.56%, precision 72.00%, dan recall 75.00%, kemudian diimplementasikan ke dalam aplikasi berbasis web menggunakan Flask.',
                'category'     => 'Machine Learning',
                'role'         => 'Machine Learning Developer',
                'duration'     => '4 Months',
                'challenges'   => 'Mengolah dataset, menentukan faktor yang relevan, menangani ketidakseimbangan data, dan menerapkan algoritma XGBoost untuk klasifikasi.',
                'reflection'   => 'Project ini meningkatkan pemahaman saya mengenai machine learning, pengolahan data, evaluasi model, serta penerapan model ke dalam aplikasi web.',
                'technologies' => ['Python', 'XGBoost', 'Machine Learning', 'Flask', 'HTML', 'CSS', 'JavaScript'],
                'image'        => 'assets/images/projects/klasifikasi-tbc.jpg',
                'github_url'   => null,
                'demo_url'     => null,
                'year'         => 2025,
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
