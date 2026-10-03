<?php

namespace App\Providers;

use App\Models\Education;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with([
                'globalProfile'     => Profile::current(),
                'globalSocialLinks' => SocialLink::active()->get(),
                'globalEducations'  => Education::query()
                    ->orderByDesc('end_year')
                    ->orderByDesc('start_year')
                    ->get(),
                'globalSkills'      => Skill::ordered()->get()->groupBy('category'),
            ]);
        });
    }
}