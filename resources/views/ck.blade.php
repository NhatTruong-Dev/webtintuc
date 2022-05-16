<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CKEditor</title>
    {{--    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>--}}
    <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/ckfinder/ckfinder.js') }}"></script>

</head>
<body>
<form action="" method="post">
    @csrf
    @isset($image)
        <textarea name="editor">{{ $image }}</textarea>
        {!! $image !!}
    @endisset
    <textarea name="editor2" id="editor2"></textarea>
    <input type="submit" value="submit">
</form>
<script type="text/javascript">
    CKEDITOR.replace( 'editor2', {
        filebrowserBrowseUrl: '/browser/browse.php',
        filebrowserUploadUrl: '/uploader/upload.php'
    });
    // CKEDITOR.replace( 'editor2', {
    //     filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    //     filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    // } );
    // var editor = CKEDITOR.replace( 'ckfinder' );
    // CKFinder.setupCKEditor( editor );
    {{--window.parent.CKEDITOR.tools.callFunction(--}}
    {{--    {!! $CKEditorFuncNum !!},--}}
    {{--    '{!! $data['url'] !!}',--}}
    {{--    '{!! $data['message'] !!}'--}}
    {{--);--}}
</script>

</body>
</html>
