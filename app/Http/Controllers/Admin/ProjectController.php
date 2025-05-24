<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        // dd($projects);
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $newproject = new Project();
        $newproject->name = $data['name'];
        $newproject->client = $data['client'];
        $newproject->period = $data['period'];
        $newproject->summary = $data['summary'];
        // dd($newproject);
        $newproject->save();

        return redirect()->route('projects.show', $newproject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // prendiamo il post con un id specifico dal database
        // modi per farlo

        //1 $project = Project::where("id", $id)->get();

        //2 $project = Project::where("id", $id)->first();

        //3 $project = Project::find($id);

        // dd($project);
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name = $data['name'];
        $project->client = $data['client'];
        $project->period = $data['period'];
        $project->summary = $data['summary'];
        $project->update();

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
