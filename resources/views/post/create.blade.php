@extends('post.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">
            <form action="{{ url('post') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div style="margin-bottom:10px"><label>Title</label></br>
                    <input type="text" name="title" id="title" class="form-control"></br>
                    @error('title')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px"><label>Image</label></br>
                    <input type="file" name="image" id="image" class="form-control"></br>
                    @error('image')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Title_image</label></br>
                    <input type="text" name="title_image" id="title_image" class="form-control"></br>
                    @error('title_image')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Sub_title</label></br>
                    <input type="text" name="sub_title" id="sub_title" class="form-control"></br>
                    @error('sub_title')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Category_id</label></br>
                    <input type="text" name="category_id" id="category_id" class="form-control"></br>
                    @error('category_id')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Details</label></br>
                    <textarea id="editor2" name="details"></textarea><br/>
                    @error('details')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <input type="submit" value="Save" class="btn btn-success"></br>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor2'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </form>

        </div>
    </div>
@stop
