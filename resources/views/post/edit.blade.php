@extends('layout')
@section('content')
    <div class="card" style="margin-left:-100px"    >
        <div class="card-header">Edit post</div>
        <div class="card-body">

            <form action="{{ url('post/' .$posts->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$posts->id}}" id="id" />
                <div style="margin-bottom:10px"><label>Tiêu đề</label></br>
                    <input type="text" name="title" id="title" class="form-control" value="{{$posts->title}}"></br>
                    @error('title')
                    <span style="color: red;margin-left:10px !important;"> • Vui lòng nhập tiêu đề !</span><br />
                    @enderror
                </div>



                <div style="margin-bottom:10px">
                    <label>Phụ đề</label></br>
                    <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{$posts->sub_title}}"></br>
                    @error('sub_title')
                    <span style="color: red;margin-left:10px"">• Vui lòng nhập lại sub_title !</span><br />
                    @enderror
                </div>

                <div style="margin-bottom:10px"><label>Hình ảnh</label></br>
                    <input type="text" name="image" id="image" class="form-control" value="{{ $posts->image }}"></br>
                    <img src="{{ $posts->image }}" width="300px">
                    @error('image')
                    <span style="color: red;margin-left:10px !important;">• Vui lòng nhập hình ảnh !</span><br />
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Danh mục</label></br>
                    <select name="category_id" class="form-control" >
                        @foreach($categories as $category)
                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div style="margin-bottom:10px">
                    <label>Chuyên đề</label></br>
                    <select name="thematic_id" class="form-control">
                        <option value=""></option>
                        @foreach($thematics as $thematic)
                            <option value="{{$thematic->id}}">{{$thematic->name}}</option>
                        @endforeach

                    </select>
                    @error('thematic_id')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Nội dung</label></br>
                    <textarea name="details" >{{$posts->details}}</textarea>
                    @error('details')
                    <span style="color: red;margin-left:10px !important;" > {{$message}}</span><br/>
                    @enderror
                </div>

                <input type="submit" value="Save" class="btn btn-success"></br>

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
