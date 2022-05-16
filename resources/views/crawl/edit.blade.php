@extends('layout')
@section('content')
    <div class="card" style="margin-left:-150px"    >
        <div class="card-header">Sửa link thu thập</div>
        <div class="card-body">

            <form action="{{ route('crawl.update', $link->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PUT")
                <label>Danh mục</label></br>
                <select name="category_id" class="form-control" >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        @if ($category->id ===$link->category_id) selected @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>


                <label style="margin-top:30px">Link</label></br>
                <input type="text" name="link_category" id="link_category" class="form-control" value="{{$link->link_category}}"></br>
                @error('link_category')
                <span style="   color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                @enderror


                <input type="submit" value="Cập nhật" class="btn btn-success"></br>

                <script type="text/javascript">
                    CKEDITOR.replace( 'details', {
                        filebrowserBrowseUrl: '/browser/browse.php',
                        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });

                </script>

            </form>

        </div>
    </div>
@stop
