<!DOCTYPE html>
<!--
	24 News by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <link href="{{ asset("h_css/media_query.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("h_css/bootstrap.css")}}" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset("h_css/animate.css")}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{ asset("h_css/owl.carousel.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("h_css/owl.theme.default.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="{{ asset("h_css/style_1.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="{{ asset("h_js/modernizr-3.5.0.min.js")}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body1, button, input {
            font: 1em Hind, sans-serif;
            line-height: 1.5em;
        }
        body1, input {
            color: #171717;
        }
        body1, .search-bar {
            display: flex;
        }
        body1 {
            background: #f1f1f1;
            height: 100vh;
        }
        .search-bar input,
        .search-btn,
        .search-btn:before,
        .search-btn:after {
            transition: all 0.25s ease-out;
        }
        .search-bar input,
        .search-btn {
            width: 3em;
            height: 3em;
        }
        .search-bar input:invalid:not(:focus),
        .search-btn {
            cursor: pointer;
        }
        .search-bar,
        .search-bar input:focus,
        .search-bar input:valid  {
            width: 100%;
        }
        .search-bar input:focus,
        .search-bar input:not(:focus) + .search-btn:focus {
            outline: transparent;
        }
        .search-bar {
            margin: auto;
            padding: 1.5em;
            justify-content: center;
            max-width: 30em;
        }
        .search-bar input {
            background: transparent;
            border-radius: 1.5em;
            box-shadow: 0 0 0 0.4em #171717 inset;
            padding: 0.75em;
            transform: translate(0.5em,0.5em) scale(0.5);
            transform-origin: 100% 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .search-bar input::-webkit-search-decoration {
            -webkit-appearance: none;
        }
        .search-bar input:focus,
        .search-bar input:valid {
            background: #fff;
            border-radius: 0.375em 0 0 0.375em;
            box-shadow: 0 0 0 0.1em #d9d9d9 inset;
            transform: scale(1);
        }
        .search-btn {
            background: #171717;
            border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0;
            padding: 0.75em;
            position: relative;
            transform: translate(0.25em,0.25em) rotate(45deg) scale(0.25,0.125);
            transform-origin: 0 50%;
        }
        .search-btn:before,
        .search-btn:after {
            content: "";
            display: block;
            opacity: 0;
            position: absolute;
        }
        .search-btn:before {
            border-radius: 50%;
            box-shadow: 0 0 0 0.2em #f1f1f1 inset;
            top: 0.75em;
            left: 0.75em;
            width: 1.2em;
            height: 1.2em;
        }
        .search-btn:after {
            background: #f1f1f1;
            border-radius: 0 0.25em 0.25em 0;
            top: 51%;
            left: 51%;
            width: 0.75em;
            height: 0.25em;
            transform: translate(0.2em,0) rotate(45deg);
            transform-origin: 0 50%;
        }
        .search-btn span {
            display: inline-block;
            overflow: hidden;
            width: 1px;
            height: 1px;
        }

        /* Active state */
        .search-bar input:focus + .search-btn,
        .search-bar input:valid + .search-btn {
            background: #2762f3;
            border-radius: 0 0.375em 0.375em 0;
            transform: scale(1);
        }
        .search-bar input:focus + .search-btn:before,
        .search-bar input:focus + .search-btn:after,
        .search-bar input:valid + .search-btn:before,
        .search-bar input:valid + .search-btn:after {
            opacity: 1;
        }
        .search-bar input:focus + .search-btn:hover,
        .search-bar input:valid + .search-btn:hover,
        .search-bar input:valid:not(:focus) + .search-btn:focus {
            background: #0c48db;
        }
        .search-bar input:focus + .search-btn:active,
        .search-bar input:valid + .search-btn:active {
            transform: translateY(1px);
        }

        @media screen and (prefers-color-scheme: dark) {
            body, input {
                color: #f1f1f1;
            }
            body {
                background: #171717;
            }
            .search-bar input {
                box-shadow: 0 0 0 0.4em #f1f1f1 inset;
            }
            .search-bar input:focus,
            .search-bar input:valid {
                background: #3d3d3d;
                box-shadow: 0 0 0 0.1em #3d3d3d inset;
            }
            .search-btn {
                background: #f1f1f1;
            }
        }
    </style>
</head>
<body>
<iframe id="tpm_html5-creative-1649745083410" style="width:100%;height:250px;margin-bottom:-10px" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" src="https://misc.dantri.com.vn/2022/03/31/139a64a9/09035750/index.html"></iframe>
<div class="container-fluid fh5co_header_bg" style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
                        class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;Hà Nội ,<?php use Illuminate\Support\Carbon;Carbon::setLocale('vi');
                    $dt = Carbon::now();
                    echo $dt->format('d/m/Y')?></a>
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#" class="treding_btn">Trending</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
                <a href="#" class="color_fff fh5co_mediya_setting">Đọc tin tức mỗi ngày để tiếp cận thế giới mới</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="https://static-znews.zingcdn.me/images/logo-zing-home.svg" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <!--<div class="d-inline-block text-center"><img src="images/country.png" alt="img" class="fh5co_country_width"/></div>-->
                <div class="text-center d-inline-block">
                    <a>
                        <form  class="search-bar" action="timkiem" method="post" role="search">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input  type="search"  name="tukhoa" required>
                            <button class="search-btn" type="submit">
                                <span>Search</span>
                            </button>
                        </form>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786" style="font-family: Arial, Helvetica, sans-serif;font-weight:bold">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('UI/Home')}}"><i class="fa-solid fa-house"></i> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item " style="display: flex">
                        @foreach($categories as $category)
                            <a class="nav-link" href="{{url('UI/Category/'.$category->id)}}"
                            >{!! $category->name !!}</a>
                        @endforeach
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding" style="font-family: Arial, Verdana, sans-serif">
        <div class="row mx-0">
    <main role="main" >
        <?php
        function doimau($str, $tukhoa)
        {
            return str_replace($tukhoa, "<span style='background-color: yellow;font-style: italic'>$tukhoa</span>",
                $str);
        }
        ?>
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tìm kiếm : {{$tukhoa}}</div>
                </div>
                @foreach($tintuc  as $item)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="{{$item ->image}}" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a  href="{{ route('home.show', $item ->id) }}" class="fh5co_magna py-2" style="font-size:22px;font-family: Times;text-decoration: none">{!! doimau($item ->title,$tukhoa) !!} <br/></a> <a  class="fh5co_mini_time py-3"> {{ \Carbon\Carbon::parse($item->created_at)->format('D d/m/Y') }}</a>
                            <div class="fh5co_consectetur" style="font-family: Arial, Verdana, sans-serif"> {!! doimau($item ->sub_title,$tukhoa) !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </main>
        </div>
    </div>
</div>
</div>


<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="row" style="margin-bottom:50px">
        <div class="col-12 spdp_right py-5"><img src="{{asset("/image/white_logo.png")}}" alt="img" class="footer_logo"/></div>
        <div class="clearfix"></div>
        <div class="col-12 col-md-6 col-lg-4" style="margin-left:50px;font-family: Arial, Verdana, sans-serif">
            <div class="footer_main_title py-3">Về chúng tôi</div>
            <div class="footer_menu"> Tòa soạn điện tử<br/>
                Luôn mang tới cho người đọc những thông tin nóng và mới nhất<br/>
                Giúp bạn nắm bắt được xu thế xã hội , nhịp sống thế giới <br>
                Thuộc Bộ Khoa học Công nghệ <br>
                Số giấy phép: 548/GP-BTTTT ngày 24/08/2021 <br>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-3">
            <div class="footer_main_title py-3"> Địa chỉ</div>
            <ul class="footer_menu">
                Tòa soạn: Quận Cầu Giấy, Hà Nội<br/>
                Hotline: 0848.794.608 - Email: toasoandientu@crawler
            </ul>
        </div>

        <div class="col-12 col-md-12 col-lg-4 ">
            <div class="footer_main_title py-3">Một sản phẩm của</div>
            <a href="#" class="footer_img_post_6"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI837wLOjmBo33gNelUhNYHBZTGj9NPanH-Q&usqp=CAU" alt="img"/></a>
            <a href="#" class="footer_img_post_6"><img src="data:image/png;base64,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" alt="img"/></a>

        </div>
    </div>
    <div class="row justify-content-center pt-2 pb-4">
        <div class="col-12 col-md-8 col-lg-7 ">
            <div class="input-group">
                <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control fh5co_footer_text_box" placeholder="Enter your email..." aria-describedby="basic-addon1">
                <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</a>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2022, All rights reserved. Design by <a href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">Nhật Trường</a>. </div>
            <div class="col-12 col-md-6 spdp_right py-4">
                <a href="{{route('contact')}}" class="footer_last_part_menu">Liên hệ ngay chúng tôi </a>
            </div>
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>
    <div class="messenger">
        <a href="#" title="Facebook" onclick="myFunction()">
            <i class="fa-solid fa-arrow-up" style="color: #757575;font-size:22px;margin-top:10px"></i>
        </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset("h_js/owl.carousel.min.js")}}"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
    <!-- Waypoints -->
    <script src="{{asset("h_js/jquery.waypoints.min.js")}}"></script>
    <!-- Main -->
    <script src="{{asset("h_js/main.js")}}}"></script>
    <!--====== jquery js ======-->
    <script src="{{asset("assets/js/vendor/modernizr-3.6.0.min.js")}}"></script>
    <script src="{{asset("assets/js/vendor/jquery-1.12.4.min.js")}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>

    <!--====== WOW js ======-->
    <script src="{{asset("assets/js/wow.min.js")}}"></script>

    <!--====== Slick js ======-->
    <script src="{{asset("assets/js/slick.min.js")}}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{asset("assets/js/scrolling-nav.js")}}"></script>
    <script src="{{asset("assets/js/jquery.easing.min.js")}}"></script>

    <!--====== Aos js ======-->
    <script src="{{asset("assets/js/aos.js")}}"></script>


    <!--====== Main js ======-->
    <script src="{{asset("assets/js/main.js")}}"></script>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset("h_js/owl.carousel.min.js")}}"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="{{asset("h_js/jquery.waypoints.min.js")}}"></script>
<!-- Main -->
<script src="{{asset("h_js/main.js")}}}"></script>

</body>
</html>
