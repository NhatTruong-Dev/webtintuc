@extends('layout')
@section('content')
    <div class="container" style="margin-left:100px">
        <div class="row">
            <div class="col-md-9" style="margin-left:-200px">
                <div class="card">
                    <div class="card-header">Link thu thập</div>
                    <div class="card-body">
                        <a href="{{ route('crawl.create') }}" class="btn btn-success btn-sm" title="Add New Link">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm link
                        </a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Link</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($link as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->category->name}}</td>
                                        <td>{{strip_tags($item->link_category) }}</td>
                                        <td>

                                            <a href="{{ url('/crawl/' . $item->id . '/edit') }}" title="Edit link" style="float: left;margin-right: 5px">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-edit"
                                                                                          aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form action="{{ route('crawl.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete category"
                                                    onclick="return confirm(&quot;Bạn có muốn xóa linh này không?&quot;)">
                                                <i class='fa fa-trash'></i></button>
                                            </form>
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
