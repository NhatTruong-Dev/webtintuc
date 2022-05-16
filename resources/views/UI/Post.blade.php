@extends('UI.index', ['categories' => $categories])
@section('content')
    <style>


        .card {
            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px
        }

        .dots {
            height: 4px;
            width: 4px;
            margin-bottom: 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block
        }

        .badge {
            padding: 7px;
            padding-right: 9px;
            padding-left: 16px;
            box-shadow: 5px 6px 6px 2px #e9ecef
        }

        .user-img {
            margin-top: 4px
        }

        .check-icon {
            font-size: 17px;
            color: #c3bfbf;
            top: 1px;
            position: relative;
            margin-left: 3px
        }

        .form-check-input {
            margin-top: 6px;
            margin-left: -24px !important;
            cursor: pointer
        }

        .form-check-input:focus {
            box-shadow: none
        }

        .icons i {
            margin-left: 8px
        }

        .reply {
            margin-left: 12px
        }

        .reply small {
            color: #b7b4b4
        }

        .reply small:hover {
            color: green;
            cursor: pointer
        }
        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }

        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }

        .form-group textarea.form-input {
            height: 150px;}
    </style>
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div><span class="badge badge-secondary" style="color: white;background-color: #1c7430;margin-left:20px;margin-bottom:20px;padding:10px;font-size:16px">{{$post->category->name}}</span></div>
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <h3 style="font-family: 'Noto Serif',serif;font-size: 3.2em;font-weight: bold">{!!($post->title)  !!}</h3>
                    <p style="color: #888888">• {{ \Carbon\Carbon::parse($post->created_at)->format('D d/m/Y') }}</p>
                    <p style="font-weight: bold;font-size:22px;font-family: 'Noto Serif',serif;">
                        {{$post->sub_title}}
                    </p>
                    <p><img src="{{asset($post->image)}}" alt="imgsrc"
                            width="100%" height="450px" style="margin-top:20px ">
                    <p style="font-size:16px;color:gray;font-family: 'Noto Serif',serif;text-align: center"><i>
                            {!! $post->title_image !!}
                        </i></p>
                    </p>
                    <p class="details" style="font-size: 20px;line-height: 30px;font-family: 'Noto Serif',serif;">
                        {!!($post->details)!!}
                    </p>

                    <hr/>
                </div>
                <div class="col-md-3 " data-animate-effect="fadeInRight"
                     style="font-family: Arial, Verdana, sans-serif">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Chuyên đề</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all" style="margin-bottom:50px">
                        @foreach($thematics as $category)
                            <a href="{{url('UI/Thematic/'.$category->id)}}"
                               class="fh5co_tagg">{!! $category->name !!}</a>
                        @endforeach
                    </div>
                    <iframe id="tpm_html5-creative-1649739328160" style="width:300px;height:600px;" frameborder="0"
                            marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
                            scrolling="no" allowfullscreen="true"
                            src="https://misc.dantri.com.vn/2022/03/29/1334b1b1/02039730/index.html"></iframe>

                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Bài viết mới nhất</div>
                    </div>
                    @foreach($postViews as $postView)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{$postView->image}}" alt="img" class="fh5co_most_trading"/>
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font" style="font-weight: bold"><a
                                        style="color:black;text-decoration: none"
                                        href="{{ route('home.show', $postView->id) }}">{{$postView->title}}</a></div>
                                <div
                                    class="most_fh5co_treding_font_123"> {{ \Carbon\Carbon::parse($postView->created_at)->format('D d/m/Y') }} </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container-fluid pb-4 pt-5">
                <div class="container animate-box">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4" style="margin-left:-15px">Bài viết khác</div>
                    </div>
                    <div class="owl-carousel owl-theme" id="slider2" style="display: flex;margin-left:-20px">
                        @foreach($post->category->post->whereNotIn('id', [$post->id])->random(3) as $postInvolve)
                            <div class="item px-2" style="width:360px">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{  $postInvolve->image }}" alt=""/></div>
                                    <div>
                                        <a href="{{ route('home.show', $postInvolve->id) }}"
                                           class="d-block fh5co_small_post_heading"><span class=""
                                                                                          style="font-weight: bold;font-family: Arial, Verdana, sans-serif"> {!! $postInvolve->title  !!}</span></a>
                                        <div class="c_g"><i
                                                class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($postInvolve->created_at)->format('D d/m/Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="container" style="margin-top:20px">
                <h3>Bình luận</h3>
                <form method="POST" enctype="multipart/form-data"  action="{{route('comment.store',$post->id)}}">
                    {!! csrf_field() !!}
                    <div class="row" style="width:750px">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <input class="form-input" name="name" type="text" placeholder="Họ tên" style="font-size:19px;color: black">
                            </div>
                        </div>
                        <br />
                        <div class="col-xs-12 col-sm-12 fl_icon">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <input class="form-input" type="text" name="email " placeholder="Email" style="font-size:19px;color: black">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-input" name="contentt" required="" placeholder="Nội dung bình luận ..." style="font-size:19px;color: black;margin-left:15px" cols="66" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi bình luận</button>

                </form>
            </div>
            <div >
            <div class="container mt-5" style="font-size:20px;margin-left:-200px">
                <div class="row d-flex justify-content-center" >
                    <div class="col-md-8">
                        <div class="headings d-flex justify-content-between align-items-center mb-3">
                            <h3 style="margin:20px">Người dùng cũng bình luận</h3>
                            <div class="buttons"> <span class="badge bg-white d-flex flex-row align-items-center">
                        <div class="form-check form-switch"> <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked> </div>
                    </span> </div>
                        </div>
                        @foreach($comments as $comment)
                        <div class="card p-3" style="margin-bottom:20px;background-color: #F7F6F6">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">{{$comment->name}}</small> <small>{{$comment->content}}</small></span> </div> <small>{{date('d/m/Y',strtotime($comment->created_at))}}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
            <script>

            </script>
@endsection
