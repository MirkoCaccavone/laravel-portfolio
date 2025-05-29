<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
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
        // Prendiamo i type
        $types = Type::all();

        // prendiamo le tecnologie
        $technologies = Technology::all();

        // dd($types);
        $statuses = ['in progress', 'completed'];
        return view('projects.create', compact('types', 'statuses', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();

        // dd($data['technologies']);

        $newproject = new Project();
        $newproject->name = $data['name'];
        $newproject->client = $data['client'];
        $newproject->period = $data['period'];
        $newproject->summary = $data['summary'];
        $newproject->type_id = $data['type_id'];
        $newproject->status = $data['status'];
        $newproject->project_url = $data['project_url'];
        // dd($newproject);
        $newproject->save();

        if ($request->has('technologies')) {
            $newproject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('admin.projects.show', $newproject->id);
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

        // dd($project->tecnologies);
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        // prendiamo le tecnologie
        $technologies = Technology::all();

        return view('projects.edit', compact('project', 'types', 'technologies'));
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
        $project->type_id = $data['type_id'];
        $project->status = $data['status'];
        $project->project_url = $data['project_url'];

        $project->update();

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }


        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
