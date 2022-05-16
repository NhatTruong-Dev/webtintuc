@extends('layout')
@section('content')
    <div class="card" style="margin-left: -150px">
    <div class="row" style="margin-left:50px;margin-top:50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Xem vai trò</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row"  style="margin-left:50px;margin-top:50px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong><br/>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label><br/>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
