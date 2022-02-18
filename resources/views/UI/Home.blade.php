@extends('UI.index', ['categories' => $categories])
@section('content')

    <div class="container">
        <h3 class="pb-3 mb-4 font-italic border-bottom" style="margin-top:20px">
            Tiêu điểm
        </h3>
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0" style="float: left;">
                <h1 class="display-4 font-italic">
                    <a href="{{ route('home.show', $postTop->id) }}" style="color:white">{{ $postTop->title }}</a>
                </h1>
                <p class="lead my-3">{{ $postTop->sub_title }}</p>
                <p class="lead mb-0"><a href="{{ route('home.show', $postTop->id) }}"
                                        class="text-white font-weight-bold">Đọc tiếp...</a></p>
            </div>
            <img src="{{ asset('image/' . $postTop->image ) }}"
                 width="500px" height="300px" style="margin-top:2%;margin-left:5%;" class="anhtinchinh">
        </div>
        <h3 class="pb-3 mb-4 font-italic border-bottom" style="margin-top:20px">
            Tin chính
        </h3>
        <div class="row mb-2">
            @foreach($categories as $category)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">{{ $category->name }}</strong>
                            @if(count($category->post))
                                <h3 class="mb-0">
                                    <a class="text-dark" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp:3;display: -webkit-box;-webkit-box-orient: vertical;height:100px"
                                       href="{{ route('home.show', $category->post->first()-> id) }}">{{ $category->post->first()->title }}</a>
                                </h3>
                                <div
                                    class="mb-1 text-muted">{{ \Carbon\Carbon::parse($category->post->first()->created_at)->toDayDateTimeString() }}</div>
                                <a href="{{ route('home.show', $category->post->first()->id) }}">Đọc tiếp...</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block"
                             src="{{ asset('image/' . $category->post->first()->image) }}"
                             alt="Card image cap" width="50%">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Tin tức khác
                </h3>

                <div id="tintuc" >
                    @foreach($postOther as $item)
                        <img src="{{ asset('image/'.$item->image) }}"
                             style="float: left;margin-right:20px;" height="170px" width="270px">
                        <div class="blog-post">
                            <h4 class="blog-post-title"><a class="text-dark" href="{{ route('home.show', $item->id) }}">{{$item->title }}</a>
                            </h4>
                            <div class="mb-1 text-muted">{{ \Carbon\Carbon::parse($item->created_at)->toDayDateTimeString() }}</div>

                            <p>{{ $item->sub_title }}</p>
                            <hr style="margin-top:40px">
                        </div>
                    @endforeach
                </div>

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Tin cũ</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Tin mới</a>
                </nav>

            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Quảng cáo</h4>
                    <img
                        src="https://img.lovepik.com/free-template/bg/20200819/bg/c7a25ed5a2ad3_405692.png_detail.jpg!wh650"
                        width="80%" height="600px" style="margin-left:10%;margin-top: 20px;">
                    <img
                        src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/58338d84612077.5d62c9fe1bd96.jpg"
                        width="80%" height="600px" style="margin-left:10%;margin-top: 20px;">
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Liên hệ</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">Zalo</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection
