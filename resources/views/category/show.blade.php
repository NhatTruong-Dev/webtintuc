@extends('layout')
@section('content')
    <div class="card" style="margin-left:-100px;font-family:Arial;font-size:19px">
        <div class="card-header">Category</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Tên danh mục: {{$categories->name }}</h5>

            </div>

            </hr>

        </div>
    </div>
@endsection
