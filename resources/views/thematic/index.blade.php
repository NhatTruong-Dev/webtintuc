@extends('layout')
@section('content')
    <div class="container" style="margin-left:100px">
        <div class="row">
            <div class="col-md-9" style="margin-left:-150px">
                <div class="card">
                    <div class="card-header">Chuyên đề</div>
                    <div class="card-body">
                        @can('them-chuyen-de')
                            <a href="{{ url('/thematic/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                                <i class="fa fa-plus" aria-hidden="true"></i> Thêm chuyên đề
                            </a>
                        @endcan
                        <br/>
                        <br/>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" style="height:55px">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($thematics as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ strip_tags($item->name) }}</td>

                                        <td>
                                            @can('sua-chuyen-de')
                                                <a href="{{ url('/thematic/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> </button></a>
                                            @endcan
                                            @can('xoa-chuyen-de')
                                                <form method="POST" action="{{ url('/thematic' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Bạn có muốn xóa chuyên đề này không?&quot;)"><i class='fa fa-trash'></i> </button>
                                                </form>
                                            @endcan
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
