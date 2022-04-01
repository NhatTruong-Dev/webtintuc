@extends('layout')
@section('content')
    <div class="card">
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

                <div style="margin-bottom:10px"><label>Hình ảnh</label></br>
                    <input type="file" name="image" id="image" class="form-control"></br>
                    <img src="/image/{{ $posts->image }}" width="300px">
                    @error('image')
                    <span style="color: red;margin-left:10px !important;">• Vui lòng nhập hình ảnh !</span><br />
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Tiêu đề hình ảnh</label></br>
                    <input type="text" name="title_image" id="title_image" class="form-control" value="{{"$posts->title_image"}}"></br>
                    @error('title_image')
                    <span style="color: red;margin-left:10px"">• Vui lòng nhập lại title_image !</span><br />
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Phụ đề</label></br>
                    <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{"$posts->sub_title"}}"></br>
                    @error('sub_title')
                    <span style="color: red;margin-left:10px"">• Vui lòng nhập lại sub_title !</span><br />
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
                    <span style="color: red;margin-left:10px">• Vui lòng nhập lại Category_id !</span><br />
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Nội dung</label></br>
                    <textarea id="editor2" name="details" value="{{"$posts->details"}}"></textarea><br/>
                    @error('details')
                    <span style="color: red;margin-left:10px">• Vui lòng nhập lại details !</span><br />
                    @enderror
                </div>

                <input type="submit" value="Update" class="btn btn-success"></br>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor2' ) )
                        .catch( error => {
                            console.error( error );
                        });
                </script>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor0' ) )
                        .catch( error => {
                            console.error( error );
                        });
                </script>
            </form>

        </div>
    </div>
@stop
