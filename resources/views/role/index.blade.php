@extends('layout')
@section('content')
    <div class="container" style="margin-left:50px">
        <div class="row">
            <div class="col-md-9" style="margin-left:-150px">
                <div class="card">
                    <div class="card-header">Vai trò</div>
                    <div class="card-body">
                        @can('them-vai-tro')
                            <a class="btn btn-success" href="{{ route('role.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i>Thêm vai trò</a>
                        @endcan
                        <br/>
                        <br/>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" style="height:55px">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên vai trò</th>
                                    <th width="280px">Hành động</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('role.show',$role->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @can('sua-vai-tro')
                                                <a class="btn btn-success btn-sm" href="{{ route('role.edit',$role->id) }}"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                            @endcan
                                            @can('xoa-vai-tro')
                                                {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Bạn có muốn xóa vai trò này không?&quot;)"><i class='fa fa-trash'></i> </button>
                                                {!! Form::close() !!}
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
        {!! $roles->render() !!}
    </div>
@endsection
