@extends('layouts.app')

@section('content')

<div class="d-flex-row p-2 my-5 ">


    <div class="text-dark h6">
        <a href="#" class="btn btn-outline-primary"> Projects </a>
    </div>


    <div>
        <a href="#" class="btn btn-outline-danger"> create new project  </a>
    </div>
</div>


    <section class="row" dir="ltr">
            <div class="col-md-4 mx-2 ">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{$project->title }}</h5>
                        </div>
                        <div class="card-body">

                            @if (  !$project->status )
                                 <span  class="text-warning">  in progress  </span>
                             @else
                              <span  class="text-success">  completed  </span>
                            
                             @endif 
    

                        </div>
                        <div class="card-text text-center">
                            <p> {{ $project->description  }} </p>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex">
                                {{$project->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>

            </div>
          <div class="row my-2">
              
            <div class="col-md-4 mx-2">
                <div class="card">
                    <div class="card-header">
                        <h5> Chnage status </h5>
                    </div>
                    <div class="card-body">

                  
                            <form action="" method="post">
                                    @csrf
                                    @method("PATCH") 
                                    <select name="status" id="status">
                                        <option value="0" {{$project->status == 0 ? 'selected' : ''}} > in progress </option>
                                        <option value="1" {{$project->status == 1 ? 'selected' : ''}} > completed </option>
                                    </select>


                            </form>
                    </div>
              
                </div>

       
     

            </div>
      

   
                <div class="col-lg-8">
                    @forelse ($project->tasks as $task)
                    <div class="card d-flex flex-row mt-3 p-3 align-items-center">
                      {{$task->body}}

                 </div>

                    @empty
                        
                    @endforelse
                

                    <div class="mr-auto">
                        <form action="" method="POST">
                            @csrf
                            @method("PATCH") 
                            <input type="checkbox" name="done" id="done" class="form-check ml-3">

                        </form>
                    </div>
                </div>
   
                
   
    
    <div class="card mt-4">
  
            <form action="{{route('add_task_form' , $project->id)}}" method="POST">
                @csrf 
                <input type="text" name="body" id="body" class="form-control p-2 ml-2 border-0" placeholder="add task ">
                <input type="hidden" name="project_id" id="project_id" value="{{$project->id}}">
                <button type="submit" class="btn btn-primary">ADD</button>
        
            </form>

        
        </div>
    
   
   
   
       
       
        </section> 


@endsection