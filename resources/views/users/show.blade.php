@extends('layout')
@section('content')
    <div class="card" style="margin-left: -50px">
    <div class="row" style="margin-left: 50px;margin-top:50px;padding-right:50px">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Xem thông tin người dùng</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Trở lại</a>
        </div>
    </div>
    </div>


    <div class="row" style="margin-left:50px;margin-top:50px">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vai trò:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
    </div>
@endsection
