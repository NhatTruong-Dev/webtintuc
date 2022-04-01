@extends('layout')
@section('content')
    <div class="card" >
        <div class="card-header">Post</div>
        <div class="card-body">

            <div class="card-body" style="color: black !important;">
                <p class="card-text"><b>Tiêu đề : </b><br/>{{$posts->title }}</p>
                <p class="card-text"><b>Hình ảnh : </b><br/>
                <img src="/image/{{ $posts->image }}" width="300px">
                </p>
                <p class="card-text"><b>Tiêu đề hình ảnh : </b><br/>{!! $posts->title_image !!}</p>
                <p class="card-text"><b>Phụ đề : </b> <br/>{{ $posts->sub_title }}</p>
                <p class="card-text"><b>Danh mục : </b> <br/>{{ $posts->category->name }}</p>
                <p class="card-text"><b>Nội dung : </b><br/> {!! $posts->details!!}</p>
            </div>

            </hr>

        </div>
    </div>
@endsection
