@extends('layout')
@section('content')
    <div class="card" style="margin-left:-150px">
        <div class="card-header">Thêm link cho thu thập</div>
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        <div class="card-body">
            <form action="{{ route('crawl.store') }}"  method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <label>Danh mục</label></br>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <label style="margin-top:30px">Link</label></br>
                <input type="text" name="link_category" id="link_category" class="form-control"></br>

                <input type="submit" value="Thêm" class="btn btn-success" style="margin-top:20px"></br>

            </form>

        </div>
    </div>
@stop
