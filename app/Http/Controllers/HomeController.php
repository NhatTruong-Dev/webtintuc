<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notifications;
use App\Models\Post;
use App\Models\Thematic;
use App\Models\User;
use App\Notifications\UserCommentNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;


class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $postTop = Post::query()->where('is_top', '1')->first();
        $postHot = Post::query()->where('is_top', '2')->get();
        $postOther = Post::query()->whereNotIn('id', [$postTop->id])->inRandomOrder()->limit(7)->get();
        $thematics=Thematic::all();
        $postViews = Post::query()->latest()->inRandomOrder()->limit(3)->get();

        return view('UI.Home', compact('categories', 'postTop', 'postOther','thematics','postHot','postViews'));
    }

    public function show($id)
    {
        $categories = Category::all();

        $comments = Comment::query()->where('post_id', $id)->get();

        $post = json_decode(Redis::get('post/' . $id));
//        if ($post != null){
//            return view('UI.Post', compact('post', 'categories', 'comments'));
//        }
        $post = Post::query()->with('category.post')->find($id);
        $postViews = Post::query()->latest()->inRandomOrder()->limit(3)->get();
        $thematics=Thematic::all();
        Redis::set('post/' . $id, $post);
        return view('UI.Post', compact('post', 'categories', 'comments','postViews','thematics'));
    }

    public function index()
    {
        return view('welcome');
    }

    public function postComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->contentt;
        $comment->post_id = $id;
        $comment->save();
        return back();
    }

    public function category($id,Request $request)
    {
        $categories = Category::all();
        $categories2 = Category::find($id);
        $post=Post::where('category_id',$id)->paginate(8);
        $postViews = Post::query()->latest()->inRandomOrder()->limit(3)->get();
        $tukhoa=$request->tukhoa;
        $thematics=Thematic::all();
        $tintuc=DB::table('post')->where('title','like','%'.$tukhoa.'%')->orWhere('sub_title','like','%'.$tukhoa.'%')->paginate(5);
        return view('UI.Category',compact('categories2','post','categories','tukhoa','tintuc','postViews','thematics'));
    }

    public function thematic($id)
    {
        $categories = Category::all();
        $categories2 = Category::find($id);
        $post=Post::where('thematic_id',$id)->paginate(5);
        $thematics=Thematic::all();
        return view('UI.Thematic',compact('categories2','post','categories','thematics','categories'));
    }

    public function timkiem(Request  $request){
        $categories = Category::all();
        $tukhoa=$request->tukhoa;
        $tintuc=DB::table('post')->where('title','like','%'.$tukhoa.'%')->orWhere('sub_title','like','%'.$tukhoa.'%')->paginate(5);
        return view('UI.timkiem',compact('tukhoa','tintuc','categories'));

    }
}
