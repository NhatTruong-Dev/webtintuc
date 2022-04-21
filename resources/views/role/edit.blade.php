@extends('layout')
@section('content')
    <div class="card" style="margin-left:-250px">
    <div class="row">
        <div class="row" style="margin-left:150px;margin-top:50px">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div><br />
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]) !!}
    {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]) !!}
    <div class="row" style="margin-left:50px;margin-top:50px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 ">
            <button type="submit" class="btn btn-success" style="margin-bottom: 50px">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    </div>
@endsection
