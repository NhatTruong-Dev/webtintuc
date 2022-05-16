@extends('layout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <div class="container"  >
        <div class="row">
            <div class="col-md-9" style="margin-left:-100px">
                <div class="card" style="width:1100px">
                    <div class="card-header">Liên hệ tòa soạn</div>
                    <div class="card-body">
                        <br/>


                        <div class="table-responsive" >
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width:500px">Thông tin liên hệ</th>
                                    <th style="width:300px;text-align: center">Tiêu đề</th>
                                    <th style="width:600px;text-align: center">Lời nhắn</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $item)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td>
                                            <div><strong>Họ tên : </strong>{{$item->name}}</div>
                                            <div><b>Email : </b>{{$item->email}}</div>
                                            <div><b>Số điện thoại : </b>{{$item->phone}}</div>
                                        </td>
                                        <td style="text-align: center"> {{$item->title}}</td>
                                        <td style="text-align: center">{{$item->detail}}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#exampleModal" style="font-size:12px !important;"
                                                    title="Phản hồi">
                                                <i class="fa-solid fa-reply"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="">
                                                            <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="container" id="#exampleModalCenter"
                                                             style="font-family: Arial">
                                                            <h3 style="margin:20px 0px">Phản hồi ý kiến bạn đọc</h3>
                                                            <form action="{{ route('send.email') }}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="email" name="email"
                                                                           class="form-control"
                                                                           placeholder="Nhập email bạn đọc"
                                                                           value="{{$item->email}}">
                                                                    @error('email')
                                                                    <span class="text-danger"> {{ $message }} </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <strong>Nội dung:</strong>
                                                                    <textarea name="subject" id="subject"></textarea>
                                                                    @error('subject')
                                                                    <span class="text-danger"> {{ $message }} </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                            class="btn btn-success save-data">Gửi
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
    <script type="text/javascript">
        CKEDITOR.replace('subject', {
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserUploadUrl: '/uploader/upload.php'
        });

    </script>
@endsection
