<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display the exhibition landing page.
     */
    public function index()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    /**
     * Get projects JSON for dynamic Vue interactions.
     */
    public function apiIndex()
    {
        return response()->json(Project::all());
    }
}
