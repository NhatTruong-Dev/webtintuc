@extends('layout')
@section('content')
    <div class="card" style="margin-left:-100px;font-family:Arial;font-size:19px">
        <div class="card-header">Xem thông tin liên hệ</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title"><b style="font-weight: bold !important;">Họ tên:</b> {{$contact->name }}</h5>
                <h5 class="card-title"><b style="font-weight: bold !important;">Email:</b> {{$contact->email }}</h5>
                <h5 class="card-title"><b style="font-weight: bold !important;">Số điện thoại:</b> {{$contact->phone }}</h5>
                <h5 class="card-title"><b style="font-weight: bold !important;">Tiêu đề:</b> {{$contact->title }}</h5>
                <h5 class="card-title"><b style="font-weight: bold !important;">Nội dung:</b> <br>{{$contact->detail }}</h5>
            </div>

            </hr>

        </div>
    </div>

@endsection
