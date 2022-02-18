<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::query()->with('post')->get();
        $postTop = Post::query()->where('is_top', '1')->first();
        $postOther = Post::query()->whereNotIn('id', [$postTop->id])->inRandomOrder()->limit(5)->get();

        return view('UI.Home', compact('categories', 'postTop','postOther'));
    }

    public function show($id)
    {
        $post = Post::query()->with('category.post')->find($id);
        if ($post == null) {
            return abort(404);
        }
        $categories = Category::query()->with(['post' => function ($query) {
            return $query->exists();
        }])->get();


        return view('UI.Post', compact('post', 'categories'));
    }


}
