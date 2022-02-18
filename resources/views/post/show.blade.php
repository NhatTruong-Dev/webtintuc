@extends('post.layout')
@section('content')
    <div class="card">
        <div class="card-header">Post</div>
        <div class="card-body">

            <div class="card-body" style="color: black !important;">
                <p class="card-text"><b>Title : </b><br/>{{$posts->title }}</p>
                <p class="card-text"><b>Image : </b><br/>
                <img src="/image/{{ $posts->image }}" width="300px">
                </p>
                <p class="card-text"><b>Image_title : </b>{!! $posts->title_image !!}</p>
                <p class="card-text"><b>Sub-title : </b> <br/>{{ $posts->sub_title }}</p>
                <p class="card-text"><b>Category_id : </b> {{ $posts->category_id }}</p>
                <p class="card-text"><b>Details : </b> {!! $posts->details!!}</p>
            </div>

            </hr>

        </div>
    </div>
@endsection
