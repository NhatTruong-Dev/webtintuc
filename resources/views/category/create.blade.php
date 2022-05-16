@extends('layout')
@section('content')
    <div class="card" style="margin-left:-100px">
        <div class="card-header">Thêm danh mục</div>
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        <div class="card-body">
            <form action="{{ url('category') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <label>Tên</label></br>
                <input type="text" name="name" id="name" class="form-control"></br>

                <input type="submit" value="Thêm" class="btn btn-success" style="margin-top:20px"></br>

            </form>

        </div>
    </div>
@stop
