@extends('layout')
@section('content')
    <div class="container" style="margin-left:100px">
        <div class="row">
            <div class="col-md-9" style="margin-left:-150px">
                <div class="card">
                    <div class="card-header">Liên hệ tòa soạn</div>
                    <div class="card-body">
                        <br/>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $item)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <a href="{{ url('/contact-adm/'. $item->id) }}" title="Xem"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
