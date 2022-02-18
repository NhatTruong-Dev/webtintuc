@extends('log.index')
@section('content')
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{route('register')}}" method="post" id="regisForm" >
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start" style="margin-bottom:20px;">
                <h2 >Đăng kí </h2>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="nameErr" class="form-control form-control-lg"
                       placeholder="Nhập email "  name="email"/>
                <label class="form-label" for="form3Example3">Email </label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form3Example3" class="form-control form-control-lg"
                       placeholder="Nhập họ tên"  name="name" required/>
                <label class="form-label" for="form3Example3" >Họ tên</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg"
                       placeholder="Nhập mật khẩu"  name="password" required minlength="6" maxlength="20"/>
                <label class="form-label" for="form3Example4" >Mật khẩu</label>
            </div>
            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản? <a href="http://127.0.0.1:8000/login"
                                                                              class="link-danger">Đăng nhập</a></p>
{{--            <div class="form-outline mb-3">--}}
{{--                <input type="password" id="form3Example4" class="form-control form-control-lg"--}}
{{--                       placeholder="Nhập mật khẩu"  name="repassword" />--}}
{{--                <label class="form-label" for="form3Example4" >Nhập lại mật khẩu</label>--}}
{{--            </div>--}}

            @if(session('success'))<span style="color: red;margin:20px 0;font-size:20px">{{session('success')}}</span>@endif
            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng kí</button>
            </div>
        </form>
    </div>


@endsection
