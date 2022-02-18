@extends('category.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        <div class="card-body">
            <form action="{{ url('category') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success" style="margin-top:20px"></br>

            </form>

        </div>
    </div>
@stop
