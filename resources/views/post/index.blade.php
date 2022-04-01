@extends('layout')
@section('content')
    <div class="container" >
        <div class="row"  style="width: 130%">
            <div class="col-md-12" style="margin-left:-150px">
                <div class="card" >
                    <div class="card-header">Post</div>
                    <div class="card-body">
                        @can('xem-bai-viet')
                        <a href="{{ url('/post/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create Post
                        </a>
                        @endcan
                        <br/>
                        <br/>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" style="height:55px">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="table-responsive" >
                            <table class="table">
                                <thead>
                                <tr style="text-align: center">
                                    <th>#</th>
                                    <th style="width: 150px">Tiêu đề</th>
                                    <th>Hình ảnh</th>
                                    <th style="width: 180px">Tiêu đề hình ảnh</th>
                                    <th style="width: 180px">Phụ đề</th>
                                    <th style="width: 150px">Danh mục</th>
                                    <th style="width: 200px">Thời gian tạo</th>
                                    <th>Nội dung</th>
                                    <th style="width:180px !important;">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr class="bang">
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $item->title }}</td>
                                        <td style="vertical-align: middle"><img src="/image/{{$item->image}}" width="100px"></td>
                                        <td style="vertical-align: middle">{{strip_tags( $item->title_image )}}</td>
                                        <td style="overflow: hidden;vertical-align: middle;text-overflow: ellipsis;-webkit-line-clamp:6;display: -webkit-box;-webkit-box-orient: vertical;height:160px">{{ $item->sub_title }}</td>
                                        <td style="vertical-align: middle;text-align: center">{{ $item->category->name }}</td>
                                        <td style="vertical-align: middle">{{ \Carbon\Carbon::parse($item->created_at)->toDayDateTimeString() }}</td>
                                        <td style="vertical-align: middle ;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp:6;display: -webkit-box;-webkit-box-orient: vertical;height:160px">{{strip_tags( $item->details)}}</td>

                                        <td style="vertical-align: middle">
                                            <a href="{{ url('/post/' . $item->id) }}" title="View "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            @can('sua-bai-viet')
                                            <a href="{{ url('/post/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> </button></a>
                                            @endcan
                                            @can('xoa-bai-viet')
                                                <form method="POST" action="{{ url('/post' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Bạn có muốn xóa bài viết này không?&quot;)"><i class='fa fa-trash'></i> </button>
                                            </form>
                                            @endcan
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
