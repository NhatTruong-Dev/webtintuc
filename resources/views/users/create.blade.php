@extends('layout')
@section('content')
    <div class="card" style="margin-left:-50px;padding-right:50px">
    <div class="row" style="margin-left: 50px;margin-top:50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tạo người dùng mới</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">< Trở lại</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Xin lỗi!</strong> Thông tin bạn nhập còn thiếu hoặc chưa đúng.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row" style="margin-left: 50px;margin-top:50px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mật khẩu:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nhập lại mật khẩu:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vai trò:</strong>
                {!! Form::select('role[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 ">
            <button type="submit" class="btn btn-success" style="margin-bottom: 50px">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@stop
