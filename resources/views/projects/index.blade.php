@extends('layouts.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5 ">


        <div class="text-dark h6">
            <a href="#" class="btn btn-outline-info"> Projects </a>



        </div>
        <div class="row">
            @forelse ($projects as $project )
            <div class="card col-md-12 my-4">

                <div class="card-body">


                    <div class="d-flex">
                        <div class="dropdown mr-1">

                               
                            @if (  !$project->status )
                                 <a  class="drop_down_link badge badge-secondary dropdown-toggle text-light" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">  in progress  </a>
                             @else
                             <a  class="drop_down_link badge badge-success dropdown-toggle text-light" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">  completed  </a>
                            
                             @endif 

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a  href="{{route('change' , $project->id)}}" class="dropdown-item   statu_change" >{{ $project->status ? "in progress" : "completed" }}</a>
                          </div>


                        </div>

               
                      </div>

           


                    <h3 class="card-title"> {{$project->title}} </h3>

                    <div class="card-text">
                        <p> {{ Str::limit( $project->description ,  150 ) }} </p>
                    </div>
                    <div class="card-footer bg-transparent">
                            
                            <div class="d-flex">
                               
                                {{ $project->created_at->diffForHumans() }}      
                                
                                                           
                            </div>

                    </div>


                </div>
            </div>
            @empty
            <a class="btn btn-outline-primary" href="{{route('add_task')}}"> create new project </a>
            @endforelse


        </div>


        <div>
            <a class="btn btn-outline-primary" href="{{route('add_task')}}"> create new project </a>
        </div>


    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(  function () 
    {
        $('#myDropdown').on('show.bs.dropdown', function (el) {
                alert("dsd");
            el.dropdown('toggle');
            })

    
    



        })


</script>


@endsection