@extends('category.layout')
@section('content')
    <div class="card">
        <div class="card-header">Edit category</div>
        <div class="card-body">

            <form action="{{ url('category/' .$categories->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$categories->id}}" id="id" />
                <label>Name</label></br>

                <input type="text" name="name" id="name" class="form-control" value="{{$categories->name}}"></br>

                <input type="submit" value="Update" class="btn btn-success" style="margin-top:20px"></br>

                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        });
                </script>
            </form>

        </div>
    </div>
@stop
