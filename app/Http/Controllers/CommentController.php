<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Rules\Captcha;
class CommentController extends Controller
{
    public function index(){
        $comment=Comment::all();
        $posts=Post::query()
            ->join('comment','post.id','=','post_id')
            ->select('comment.*','post.title')
            ->paginate(10);

        return view('comment.index',compact('comment','posts'));
    }
    public function destroy($id){
        Comment::destroy($id);
        Toastr::success('Xóa bình luận thành công');
        return redirect()->route('comment.index');
    }
}
