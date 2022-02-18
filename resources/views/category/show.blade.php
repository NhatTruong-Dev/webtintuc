@extends('category.layout')
@section('content')
    <div class="card">
        <div class="card-header">Category</div>
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Name category : {{$categories->name }}</h5>

            </div>

            </hr>

        </div>
    </div>
@endsection
