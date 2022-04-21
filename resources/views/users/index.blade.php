@extends('layout')
@section('content')
    <div class="container" style="margin-left:100px">
        <div class="row">
            <div class="col-md-9" style="margin-left:-150px">
                <div class="card">
                    <div class="card-header">Nhân viên</div>
                    <div class="card-body">
                        <a href="{{ route('users.create') }}"  class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create User
                        </a>
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
                                    <th style="width:500px">Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th style="width: 580px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a class="btn btn-success btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit" aria-hidden="true"></i> </a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Bạn có muốn xóa người dùng này không?&quot;)"><i class='fa fa-trash'></i> </button>
                                            {!! Form::close() !!}
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
        {!! $data->render() !!}
    </div>
@endsection
