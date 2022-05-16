@extends('UI.index')
@section('content')
    <head>
        <link rel="shortcut icon" href="{{asset("assets/images/favicon.png")}}" type="image/png">

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">

        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="{{asset("assets/css/font-awesome.min.css")}}">

        <!--====== Line Icons css ======-->
        <link rel="stylesheet" href="{{asset("assets/css/LineIcons.css")}}">

        <!--====== Animate css ======-->
        <link rel="stylesheet" href="{{asset("assets/css/animate.css")}}">

        <!--====== Aos css ======-->
        <link rel="stylesheet" href="{{"assets/css/aos.css"}}">

        <!--====== Slick css ======-->
        <link rel="stylesheet" href={{asset("assets/css/slick.css")}}>

        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{asset("assets/css/default.css")}}">

        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    </head>
<body>
<!--====== PRELOADER PART START ======-->
<div class="preloader">
    <div class="loader_34">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== PRELOADER ENDS START ======-->

<!--====== HEADER PART START ======-->

<header id="home" class="header-area pt-100">

    <div class="shape header-shape-one">
        <img src="{{asset("assets/images/banner/shape/shape-1.png")}}" alt="shape">
    </div> <!-- header shape one -->

    <div class="shape header-shape-tow animation-one">
        <img src="{{asset("assets/images/banner/shape/shape-2.png")}}" alt="shape">
    </div> <!-- header shape tow -->

    <div class="shape header-shape-three animation-one">
        <img src="{{asset("assets/images/banner/shape/shape-3.png")}}" alt="shape">
    </div> <!-- header shape three -->

    <div class="shape header-shape-fore">
        <img src="{{asset("assets/images/banner/shape/shape-4.png")}}" alt="shape">
    </div> <!-- header shape three -->



    <div class="header-banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-sm-10">
                    <div class="banner-content">
                        <h4 class="sub-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">Chuyên đề</h4>
                        <h1 class="banner-title mt-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2s"> {{$thematics2->name}}</h1>
                        <a class="banner-contact mt-25 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2.3s" href="#contact">Tin tức mới</a>
                    </div> <!-- banner content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="banner-image bg_cover" style="margin-top:-50px;width:900px;height:650px;opacity:80;"></div>
    </div> <!-- header banner -->

</header>

<!--====== HEADER PART ENDS ======-->

<!--====== ABOUT PART START ======-->



<!--====== ABOUT PART ENDS ======-->

<!--====== SERVICES PART START ======-->

<section id="service" class="services-area pt-125 pb-130 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center pb-20">

                    <h2 class="title">Các bài viết liên quan</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            @foreach($post as $item)
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                    <div class="services-icon">
                        <img  src="{{$item->image}}" width="250px" height="150px" alt="">
                    </div>
                    <div class="services-content mt-15">
                        <h4 ><a href="{{ route('home.show', $item->id) }}" style="color:black">{{$item->title }}</a></h4>
                        <p class="mt-20">{{ $item->sub_title }}</p>
                    </div>
                </div> <!-- single services -->
            </div>
            @endforeach

        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== SERVICES PART ENDS ======-->

<!--====== PROJECT PART START ======-->

<div class="col-md-6 " data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading  py-2 mb-4">Các chuyên đề khác</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all" style="margin-bottom:50px">
        @foreach($thematics as $category)
            <a href="{{url('UI/Thematic/'.$category->id)}}" class="fh5co_tagg">{!! $category->name !!}</a>
        @endforeach
    </div>



</div>
</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TOP PART START ======-->

<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>


</body>

@endsection
