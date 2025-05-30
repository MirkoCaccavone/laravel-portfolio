<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // funzione index
    public function index()
    {
        // // recuperiamo tutti i progetti
        // $projects = Project::all();

        // recuperiamo i progetti con le relazioni (type)
        $projects = Project::with(['type'])->get();
        return response()->json(
            [
                'success' => true,
                'data' => $projects
            ]
        );
    }


    // funzione show
    public function show(Project $project)
    {
        $project->load('type', 'technologies');
        return response()->json(
            [
                'success' => true,
                'data' => $project
            ]
        );
    }
}
