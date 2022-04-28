@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center my-5 ">


    <div class="text-dark h6">
        <a href="#" class="btn btn-outline-info"> Projects </a>
    </div>


    <div>
        <a href="#" class="btn btn-outline-danger"> create new project  </a>
    </div>



    <section class="row text-left">
            
            <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                                    {{dd( $project->status ) }}

                        </div>

                    </div>

            </div>

    </section>


</div>

@endsection