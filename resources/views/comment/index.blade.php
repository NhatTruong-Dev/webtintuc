@extends('layout')
@section('content')
    <div class="container" style="margin-left:50px">
        <div class="row" style="width: 130%">
            <div class="col-md-12" style="margin-left:-150px">
                <div class="card">
                    <div class="card-header">Quản lí bình luận</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr style="text-align: center">
                                    <th style="width:20px">#</th>
                                    <th style="width: 250px">Bài viết</th>
                                    <th style="width:150px">Tên người bình luận</th>
                                    <th style="width: 340px">Nội dung bình luận</th>
                                    <th style="width: 30px">Quản lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr class="bang">
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{$item->title}}</td>
                                        <td style="vertical-align: middle;text-align: center">{{$item->name}}</td>
                                        <td style="overflow: hidden;vertical-align: middle;text-overflow: ellipsis;-webkit-line-clamp:6;text-align: center;display: -webkit-box;-webkit-box-orient: vertical;height:160px;padding-top:14%">{{ $item->content }}</td>
                                        <td style="vertical-align: middle">
                                            <form method="POST"
                                                  action="{{ url('/manage-comment/' . $item->id.'/delete') }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete category"
                                                        onclick="return confirm(&quot;Bạn có muốn xóa bình luận này không?&quot;)">
                                                    <i class='fa fa-trash'></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation example">
                                {{ $posts->links('pagination.default') }}
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
