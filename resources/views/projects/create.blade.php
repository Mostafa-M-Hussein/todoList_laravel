@extends("layouts.app")


@section("content")
<div class="row justify-content-center text-left">

    <div class="col-md-8">

        <div class="card">
            <h4 class="card-title text-center"> new Project </h4>

            <div class="card-body">
                <form action="{{route("add_task")}}" method="POST" dir="ltr">
                    @csrf

                    <div class="form-group">
                        <label for="title">title</label>
                        <input type='text' class="form-control" name="title" id="title">
                    </div>


                    <div class="form-group">
                        <label for="description">description </label>
                        <input type='text' class="form-control" name="description" id="description">
                    </div>

                    <div class="form-group py-2">
                        <button type="submit" class="btn btn-outline-primary">add</button>

                    </div>


                </form>


            </div>
        </div>

    </div>

</div>
@endsection