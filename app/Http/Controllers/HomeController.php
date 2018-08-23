<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;
use App\ProjectUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = auth()->user();
        if($user->is_support){
            $my_incidents = Incident::where('project_id',$user->selected_project_id)->where('support_id',$user->id)->get();
            $projectUser = ProjectUser::where('project_id',$user->selected_project_id)->where('user_id',$user->id)->first();
            $pending_incidents = Incident::where('support_id',null)->where('level_id',$projectUser->level_id)->get();    
        }
        
        $incidents_by_me = Incident::where('client_id',$user->id)->where('project_id',$user->selected_project_id)->get();
        $this->middleware('auth')->with(compact('my_incidents','pending_incidents','incidents_by_me'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function selectProject($id)
    {
        // Validar que el usuario este asociado al proyecto
        $user = auth()->user();
        $user->selected_project_id = $id;
        $user->save();

        return back();
    }

}
