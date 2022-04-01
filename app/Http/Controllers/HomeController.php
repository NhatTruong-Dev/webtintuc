<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notifications;
use App\Models\Post;
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
        $categories = Category::query()->with('post')->get();
        $postTop = Post::query()->where('is_top', '1')->first();
        $postOther = Post::query()->whereNotIn('id', [$postTop->id])->inRandomOrder()->limit(5)->get();

        return view('UI.Home', compact('categories', 'postTop', 'postOther'));
    }

    public function show($id)
    {
        $categories = Category::query()->with(['post' => function ($query) {
            return $query->exists();
        }])->get();

        $comments = Comment::query()->where('post_id', $id)->get();

        $post = json_decode(Redis::get('post/' . $id));
//        if ($post != null){
//            return view('UI.Post', compact('post', 'categories', 'comments'));
//        }
        $post = Post::query()->with('category.post')->find($id);
        Redis::set('post/' . $id, $post);
        return view('UI.Post', compact('post', 'categories', 'comments'));
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



}
