<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'projects'        => Project::count(),
                'featured'        => Project::featured()->count(),
                'skills'          => Skill::count(),
                'educations'      => Education::count(),
                'unread_messages' => ContactMessage::where('is_read', false)->count(),
            ],
            'latestProjects' => Project::latest()->take(5)->get(),
            'latestMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}