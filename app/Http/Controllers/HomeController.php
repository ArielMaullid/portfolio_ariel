<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::query()
            ->featured()
            ->ordered()
            ->take(6)
            ->get();

        return view('home', [
            'featuredProjects' => $featuredProjects,
        ]);
    }
}