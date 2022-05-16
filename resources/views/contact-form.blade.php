@extends('UI.index', ['categories' => $categories])
@section('content')


    <div class="container-fluid  fh5co_fh5co_bg_contcat" >
        <div class="container" >
            <div class="row py-4" style="font-family: Arial, Verdana, sans-serif">
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-phone"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Gọi cho chúng tôi</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">0848794608</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-envelope"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Bạn có câu hỏi?</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">luongnhattruong2806@gmail.com</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-map-marker"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Địa chỉ</span>
                            <span class="d-block c_g fh5co_contact_us_no_text"> Hà Nội </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-4">
        <div class="container">
            <div class="col-12 text-center contact_margin_svnit ">
                <div class="text-center fh5co_heading py-2">Liên hệ với chúng tôi</div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form name="add-blog-post-form" class="row" id="fh5co_contact_form" method="post" action="{{url('store-form')}}">
                        @csrf
                        <div class="col-12 py-3">
                            <label for="exampleInputEmail1">Họ tên</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                        </div>
                        <div class="col-12 py-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required="">
                        </div>
                        <div class="col-12 py-3">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" id="phone" name="phone" class="form-control" required="">
                        </div>
                        <div class="col-12 py-3">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" id="title" name="title" class="form-control" required="">
                        </div>
                        <div class="col-12 py-3">
                            <label for="exampleInputEmail1">Nội dung</label><br/>
                            <textarea name="detail" id="detail" cols="73" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left:20px">Gửi</button>
                    </form>                </div>
                <div class="col-12 col-md-6 align-self-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6149434649737!2d105.80324391488371!3d21.04808768598793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abc711487043%3A0x752b5609db299b26!2zMjAgxJAuIFbDtSBDaMOtIEPDtG5nLCBYdcOibiBMYSwgVMOieSBI4buTLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1650094457277!5m2!1sen!2s" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
