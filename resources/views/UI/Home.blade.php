@extends('UI.index', ['categories' => $categories])
@section('content')
    <div class="container-fluid paddding mb-5" style="font-family: Arial, Helvetica, sans-serif;">
        <h3 style="font-family: Arial, Verdana, sans-serif;font-weight: bold;margin:20px">Bài viết phổ biến</h3>
        <div class="row mx-0">
            <div class="col-md-6 col-12 paddding " data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height"><img src="{{ asset($postTop->image ) }}" alt="img"/>
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;Dec
                                31,2017
                            </a></div>
                        <div class="" style="margin-right:60px !important;"><a
                                href="{{ route('home.show', $postTop->id) }}"
                                class="fh5co_good_font">{{ $postTop->title }}</a></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-6 col-6 paddding " data-animate-effect="fadeIn">
                            @if(count($category->post))
                                <div class="fh5co_suceefh5co_height_2"><img src="{{$category->post->first()->image}}"
                                                                            alt="img"/>
                                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                    <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                        <div class=""><a href="{{ route('home.show', $category->post->first()-> id) }}"
                                                         class="color_fff"> <i
                                                    class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($category->post->first()->created_at)->format('D d/m/Y') }}
                                            </a></div>
                                        <div class="" style="margin-right:30px"><a
                                                href="{{ route('home.show', $category->post->first()-> id) }}"
                                                class="fh5co_good_font_2">{{ $category->post->first()->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="chuyende" style="height:50px;width:1250px;margin-left:190px;margin-bottom:80px;font-family: Arial, Verdana, sans-serif" >
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4 " style="margin-left:30px">Chuyên đề</div>

            <ul style="display: flex;list-style-type: none">
                <li style="margin-right: 30px"><img src="https://static-znews.zadn.vn/images/stat.svg" alt=""
                                                    width="40px"></li>
                @foreach($thematics as $thematic)
                    <li >
                        <div class="buttons" style="margin-right:-10px;margin-top:-25px;">
                            <button class="btn-hover color-1" style="padding-left:25px"># <a class="text-dark" href="{{url('UI/Thematic/'.$thematic->id)}}"
                                                                                             style="margin-right:30px;color:whitesmoke;text-decoration: none">{!! $thematic->name !!}</a>
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

    <div class="container-fluid pt-3" style="font-family: Arial, Helvetica, sans-serif;">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin nóng</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1" style="display: flex">
                @foreach($postHot as $pH)
                    <div class="item px-2" style="width:370px">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img src="{{$pH->image}}" alt=""
                                                                       class="fh5co_img_special_relative"/></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{ route('home.show', $pH->id) }}" class="text-white"> {{$pH->title}}</a>
                                <div
                                    class="fh5co_latest_trading_date_and_name_color"> {{ \Carbon\Carbon::parse($pH->created_at)->format('D d/m/Y') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="container-fluid pb-4 pt-4 paddding" style="font-family: Arial, Helvetica, sans-serif;">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 " data-animate-effect="fadeInLeft"
                     style="font-family: Arial, Helvetica, sans-serif;">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin tức khác</div>
                    </div>
                    @foreach($postOther as $item)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{$item->image}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7  nonehover">
                                <a href="{{ route('home.show', $item->id) }}" class="fh5co_mini_time"
                                   style="font-size:23px;font-weight: bold;text-decoration: none;font-family:Times, serif !important;"> {{$item->title}}
                                    <br/></a>
                                <p class="fh5co_mini_time "> {{ \Carbon\Carbon::parse($item->created_at)->format('D d/m/Y') }} </p>
                                <div class="fh5co_consectetur">  {{$item->sub_title}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3 " data-animate-effect="fadeInRight">
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

        </div>
    </div>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-c02d782f-4c40-42b7-825f-d170dbab239d"></div>
@endsection
