<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'full_name'         => 'Ariel Maulidibillah',
                'headline'          => 'Fresh Graduate S1 Teknik Informatika',
                'short_bio'         => 'Fresh graduate S1 Teknik Informatika yang berfokus pada pengembangan aplikasi web, software development, dan pengelolaan basis data. Terbuka untuk peluang kerja, magang, maupun project profesional.',
                'about_me'          => "Saya adalah fresh graduate S1 Teknik Informatika Universitas Muhammadiyah Sukabumi dengan ketertarikan pada pengembangan aplikasi berbasis web, software development, database, dan teknologi informasi.\n\nSelama masa perkuliahan saya mengerjakan beberapa project, mulai dari aplikasi presensi berbasis web hingga sistem klasifikasi diagnosis menggunakan machine learning. Saya terbiasa menggunakan Laravel, PHP, MySQL, dan tools pendukung seperti Git serta Visual Studio Code.\n\nSaat ini saya sedang mencari peluang kerja, magang, atau project profesional untuk terus mengembangkan kemampuan teknis dan berkontribusi secara nyata di dunia industri.",
                'photo'             => 'assets/images/profile.jpg',
                'cv_file'           => 'assets/cv/ariel-maulidibillah-cv.pdf',
                'location'          => 'Sukabumi, Jawa Barat, Indonesia',
                'university'        => 'Universitas Muhammadiyah Sukabumi',
                'major'             => 'Teknik Informatika',
                'graduation_status' => 'Fresh Graduate',
            ]
        );
    }
}