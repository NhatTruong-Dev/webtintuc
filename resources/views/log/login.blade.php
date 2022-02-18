@extends('log.index')
@section('content')
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{route('login')}}" method="post" name="form_login">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start" style="margin-bottom:20px;">
                <h2 >Đăng nhập </h2>
            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg"
                       name="email"   value="{{ old('email') }}" placeholder="Nhập email"  required/>
                <label class="form-label" for="form3Example3" >Tài khoản</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg"
                       placeholder="Nhập mật khẩu" name="password"  required/>
                <label class="form-label" for="form3Example4">Mật khẩu</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="#!" class="text-body">Quên mật khẩu?</a>
            </div>
            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="http://127.0.0.1:8000/register"
                                                                              class="link-danger">Đăng kí</a></p>
            @if(session('error'))<span style="color: red;margin:20px 0;font-size:20px">{{session('error')}}</span>@endif
            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;" onsubmit="return validateForm()">Login</button>

            </div>

        </form>
    </div>
@endsection

<script type = "text/javascript">
    function validateForm() {

        if( document.form_login.name.value == "" ) {
            alert( "Vui lòng điền họ tên!" );
            document.form_login.name.focus() ;
            return false;
        }
        if( document.form_login.password.value == "" ) {
            alert( "Vui lòng nhập mật khẩu!" );
            document.form_login.password.focus() ;
            return false;
        }

        return( true );
    }
</script>
