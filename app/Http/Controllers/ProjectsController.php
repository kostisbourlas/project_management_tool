<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    /**
     * Persist a new Project.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project)
    {
        $attributes = $this->validateRequest();

//        $attributes['owner_id'] = auth()->id();
//        Project::create($attributes);

//        $project = auth()->user()->projects()->create($attributes);

        $project = Project::create([
            'owner_id' => auth()->id(),
            'title' => request('title'),
            'description' => request('description'),
            'notes' => request('notes'),
        ]);

        return redirect($project->path());
    }

    public function show(Project $project)
    {
//        if(auth()->id() != $project->owner_id) {
//            abort(403);
//        }

        $this->authorize('update', $project);


        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
//        if (auth()->user()->isNot($project->owner)) {
//            abort(403);
//        }

        $this->authorize('update', $project);

        $attributes = $this->validateRequest();

        $project->update($attributes);

        return redirect($project->path());
    }

    protected function validateRequest()
    {
        $attributes = request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);

        return $attributes;
    }
}
