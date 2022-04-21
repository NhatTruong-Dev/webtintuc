@extends('UI.index')
@section('content')

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding" style="font-family: Arial, Verdana, sans-serif">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">123</div>
                    </div>
                    @foreach($post as $item)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{$item->image}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a  href="{{ route('home.show', $item->id) }}" class="fh5co_magna py-2" style="font-size:22px;font-family: Times;text-decoration: none">{{$item->title }}<br/></a> <a  class="fh5co_mini_time py-3"> {{ \Carbon\Carbon::parse($item->created_at)->format('D d/m/Y') }}</a>
                                <div class="fh5co_consectetur"> {{ $item->sub_title }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <nav aria-label="Page navigation example">
                        {{ $post->links('pagination.default') }}
                    </nav>
                </div>
                <div class="col-md-3 " data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Chuyên đề</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all" style="margin-bottom:50px">
                        @foreach($thematics as $category)
                            <a href="{{url('UI/Thematic/'.$category->id)}}" class="fh5co_tagg">{!! $category->name !!}</a>
                        @endforeach
                    </div>
                    <iframe id="tpm_html5-creative-1649739328160" style="width:300px;height:600px;" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" src="https://misc.dantri.com.vn/2022/03/29/1334b1b1/02039730/index.html"></iframe>



                </div>
            </div>

        </div>
    </div>
    </div>


@endsection
