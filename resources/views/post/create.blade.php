@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">
            <form action="{{ url('post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom:10px"><label>Tiêu đề</label></br>
                    <input type="text" name="title" id="title" class="form-control"></br>
                    @error('title')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px"><label>Hình ảnh</label></br>
                    <input type="file" name="image" id="image" class="form-control"></br>
                    @error('image')
                    <span style="color: red;margin-left:10px !important;"> {{$message}}</span><br/>
                    @enderror
                </div>

                <div style="margin-bottom:10px">
                    <label>Tiêu đề hình ảnh</label></br>
                    <input type="text" name="title_image" id="title_image" class="form-control"></br>
                    @error('title_image')
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
                    <label>Nội dung</label></br>
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
