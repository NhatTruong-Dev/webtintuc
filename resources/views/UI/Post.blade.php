@extends('UI.index', ['categories' => $categories])
@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <p style="border-bottom: 1px solid black;padding-bottom: 10px;font-size:22px;font-weight:600">
                {{$post->category->name}}
            </p>
            <div id="tintuc">
                <div class="blog-post" style="margin-bottom:0px;">
                    <h3 class="blog-post-title">{{strip_tags($post->title)}}</h3>
                    <p class="blog-post-meta">
                    </p>

                    <p style="font-weight: bold;font-size:22px;font-family:'Times New Roman', Times, serif">
                        {{$post->sub_title}}
                    </p>
                    <p style="font-size:19px;font-family:'Times New Roman', Times, serif">
                        {{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}
                        <img
                            src="/image/{{ $post->image }}"
                            width="100%" height="25%" style="margin-top:20px ">
                    <p style="font-size:16px;color:gray;font-family:'Times New Roman', Times, serif"><i>
                        {!! $post->title_image !!}
                        </i></p>
                    <p style="font-size:19px;font-family:'Times New Roman', Times, serif">
                        {{strip_tags($post->details)}}
                    </p>
                    </p>
                    <hr/>
                </div><!-- /.blog-post -->
                <div class="bailienquan">
                    <h4>Bài liên quan</h4>
                    @foreach($post->category->post as $postInvolve)
                    <div id="tintuc">
                        <div class="blog-post">
                            <img src="{{ asset('image/' . $postInvolve->image) }}"
                                 style="float: left;margin-right:20px;" height="180px" width="270px">
                            <h3 ><a href="#" style="color:black;"> </a>{!! $postInvolve->title  !!}</h3>
                                    <p class="blog-post-meta">{{ \Carbon\Carbon::parse($postInvolve->created_at)->toDayDateTimeString() }}  <a href="#">{{$postInvolve->user_id}}</a></p>

                                    <p>{{$postInvolve->sub_title}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Tin cũ</a>
                <a class="btn btn-outline-secondary disabled" href="#">Tin mới</a>
            </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar" style="margin-top: 50px;">
            <div class="p-3 mb-3 rounded">
                <img
                    src="https://img.lovepik.com/free-template/bg/20200819/bg/c7a25ed5a2ad3_405692.png_detail.jpg!wh650"
                    width="300px" height="600px" style="margin-left:5%;" class="anhqc">
            </div>
            <div class="p-3 mb-3 rounded">
                <img
                    src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/58338d84612077.5d62c9fe1bd96.jpg"
                    width="300px" height="600px" style="margin-left:5%;" class="anhqc">
            </div>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->
@endsection
