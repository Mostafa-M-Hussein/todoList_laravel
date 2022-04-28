<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

        $projects = Project::where('user_id' , Auth::id() )->get() ; 

        return view("projects.index" )->with(['projects' => $projects ]);
    
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $request->validate([
                'title' => 'required' , 
                'description' => 'required'

            ]); 


            $title = $request->input('title');
            $desc = $request->input('description'); 

            $project = new Project( ) ; 

            $project->title = $title ; 
            $project->description = $desc ;
            $project->user_id = Auth::id() ; 
            $project->save() ;

             return redirect( route('tasks') );


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

     public function change( $id  )
     {
     
   
        $project_statu = Project::find($id);
         $statu = $project_statu->status ;
         if ( $statu  )
         $project_statu->status = 0 ; 
        else
        $project_statu->status = 1 ;
        $project_statu->save() ;
        return back();




     } 
    public function show(Project $project  )
    {

        
        if ( $project->user_id == Auth::id() )
        {
            return view('projects.show' , compact('project') );

        }


        abort(403) ; 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //ff
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    { 
        //
    }
}
