@extends('layout')
@section('content')
    <div class="card" style="margin-left:-150px">
        <div class="card-header">Sửa chuyên đề </div>
        <div class="card-body">

            <form action="{{ url('thematic/' .$thematic->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$thematic->id}}" id="id" />
                <label>Tên</label></br>

                <input type="text" name="name" id="name" class="form-control" value="{{$thematic->name}}"></br>

                <input type="submit" value="Cập nhật" class="btn btn-success" style="margin-top:20px"></br>

            </form>

        </div>
    </div>
@stop
