<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    public function store(Request $request)
    {
    	$rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar el nombre del nivel'
        ];

        $this->validate($request,$rules,$messages);
        Level::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
    	$rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar el nombre del nivel'
        ];

        $this->validate($request,$rules,$messages);
        $level_id = $request->input('level_id');
        $level = Level::find($level_id);
        $level->name = $request->input('name');
        $level->save();
        return back();
    }

    public function delete($id)
    {
    	Level::find($id)->delete();
    	return back();
    }

    public function byProject($id)
    {
        return Level::where('project_id',$id)->get();
    }
}
