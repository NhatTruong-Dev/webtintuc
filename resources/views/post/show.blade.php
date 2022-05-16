@extends('layout')
@section('content')
    <div class="card" style="margin-left:-150px;font-family:Arial;font-size:19px">
        <div class="card-header">Bài viết</div>
        <div class="card-body">
            @isset($posts)
                <div class="card-body" style="color: black !important;">
                    <p class="card-text"><b>Tiêu đề : </b><br/>{{$posts->title }}</p>
                    <p class="card-text"><b>Hình ảnh : </b><br/>
                        <img src="{{asset($posts->image)}}" width="300px" />

                    </p>
                    <p class="card-text"><b>Phụ đề : </b> <br/>{{ $posts->sub_title }}</p>
                    <p class="card-text"><b>Danh mục : </b> <br/>{{ $posts->category->name }}</p>
                    @if(!empty($posts->thematic->name))
                    <p class="card-text"><b>Chuyên đề : </b> <br/>{{ $posts->thematic->name }}</p>
                    @endif
                    <p class="card-text"><b>Nội dung : </b><br/> {!! $posts->details!!}</p>
                </div>
                @endisset
                </hr>

        </div>
    </div>
@endsection
