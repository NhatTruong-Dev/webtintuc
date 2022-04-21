@extends('layout')
@section('content')
    <div class="card" style="margin-left:-100px">
        <div class="card-header">Thêm bài viết</div>
        <div class="card-body">
            <form action="{{ url('post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom:10px"><label>Tiêu đề</label></br>
                    <input type="text" name="title" id="title" class="form-control"></br>
                    @error('title')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>



                <div style="margin-bottom:10px">
                    <label>Phụ đề</label></br>
                    <input type="text" name="sub_title" id="sub_title" class="form-control"></br>
                    @error('sub_title')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px"><label>Hình ảnh</label></br>
                    <input type="text" name="image" id="image" class="form-control"></br>
                    @error('image')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Danh mục</label></br>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                    @error('category_id')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
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
                    <textarea name="details" id="details"></textarea>
                    @error('details')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <input type="submit" value="Save" class="btn btn-success"></br>

                <script type="text/javascript">
                    CKEDITOR.replace( 'details', {
                        filebrowserBrowseUrl: '/browser/browse.php',
                        filebrowserUploadUrl: '/uploader/upload.php'
                    });

                </script>

            </form>

        </div>
    </div>
@stop
