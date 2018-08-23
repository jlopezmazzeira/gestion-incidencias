<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::withTrashed()->get();
    	return view('admin.projects.index')->with(compact('projects'));
    }

    public function store(Request $request)
    {
        $this->validate($request,Project::$rules,Project::$messages);
    	Project::create($request->all());
        /*$project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->start = bcrypt($request->input('start'));
        $project->save();*/

        return back()->with('notification','Proyecto registrado exitosamente.');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $categories = $project->categories;
        $levels = $project->levels;
    	return view('admin.projects.edit')->with(compact('project','categories','levels'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,Project::$rules,Project::$messages);
    	Project::find($id)->update($request->all());
    	/*$project = Project::find($id);
        $project->name =  $request->input('name');
        $project->description = $request->input('description');
        $project->start = bcrypt($request->input('start'));
        $project->save();*/
        return back()->with('notification','Usuario modificador exitosamente.');
    }

    public function delete($id)
    {	
    	Project::find($id)->delete();
        /*$project = Project::find($id);
        $project->delete();*/
        return back()->with('notification','El proyecto se ha deshabilitado.');
    }

    public function restore($id)
    {	
    	Project::withTrashed($id)->restore();
        /*$project = Project::find($id);
        $project->delete();*/
        return back()->with('notification','El proyecto se ha habilitado.');
    }
}
