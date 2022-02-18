@extends('category.layout')
@section('content')
    <div class="container" >
        <div class="row"  style="width: 130%">
            <div class="col-md-12" style="margin-left:-150px">
                <div class="card" >
                    <div class="card-header">Post</div>
                    <div class="card-body">
                        <a href="{{ url('/post/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create Post
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive" >
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 200px">Title</th>
                                    <th>Image</th>
                                    <th style="width: 180px">Title_image</th>
                                    <th style="width: 180px">Sub-title</th>
                                    <th style="width: 50px">Category_id</th>
                                    <th>Created_at</th>
                                    <th>Details</th>
                                    <th style="width:180px !important;">Function</th>
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
                                        <td style="vertical-align: middle">{{ $item->category_id }}</td>
                                        <td style="vertical-align: middle">{{ \Carbon\Carbon::parse($item->created_at)->toDayDateTimeString() }}</td>
                                        <td style="vertical-align: middle ;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp:6;display: -webkit-box;-webkit-box-orient: vertical;height:160px">{{strip_tags( $item->details)}}</td>

                                        <td style="vertical-align: middle">
                                            <a href="{{ url('/post/' . $item->id) }}" title="View "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/post/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> </button></a>
                                            <form method="POST" action="{{ url('/post' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Bạn có muốn xóa bài viết này không?&quot;)"><i class='fa fa-trash'></i> </button>
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
