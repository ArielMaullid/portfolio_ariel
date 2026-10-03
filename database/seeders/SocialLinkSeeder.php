<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            [
                'platform' => 'github',
                'label'    => 'GitHub',
                'url'      => config('portfolio.github'),
                'icon'     => 'bi-github',
            ],
            [
                'platform' => 'linkedin',
                'label'    => 'LinkedIn',
                'url'      => config('portfolio.linkedin'),
                'icon'     => 'bi-linkedin',
            ],
            [
                'platform' => 'whatsapp',
                'label'    => 'WhatsApp',
                'url'      => config('portfolio.whatsapp')
                    ? 'https://wa.me/' . config('portfolio.whatsapp') . '?text=' . urlencode(config('portfolio.whatsapp_message'))
                    : '',
                'icon'     => 'bi-whatsapp',
            ],
            [
                'platform' => 'email',
                'label'    => 'Email',
                'url'      => config('portfolio.email') ? 'mailto:' . config('portfolio.email') : '',
                'icon'     => 'bi-envelope',
            ],
        ];

        foreach ($links as $i => $link) {
            // Skip kalau URL kosong — jangan simpan entry kosong
            if (empty($link['url'])) {
                continue;
            }

            SocialLink::updateOrCreate(
                ['platform' => $link['platform']],
                [
                    'label'     => $link['label'],
                    'url'       => $link['url'],
                    'icon'      => $link['icon'],
                    'order'     => $i,
                    'is_active' => true,
                ]
            );
        }
    }
}