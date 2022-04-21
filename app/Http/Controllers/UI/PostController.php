<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post as PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index()
    {
        return view('UI.Category');
    }


    public function show($id,Request $request)
    {
        $post = PostModel::query()->find($id);
        $tukhoa=$request->tukhoa;
        $tintuc=DB::table('post')->where('title','like','%'.$tukhoa.'%')->orWhere('sub_title','like','%'.$tukhoa.'%')->paginate(5);

        return view('UI.Post', compact('post','tukhoa','tintuc'));

    }

    public function timkiem(Request  $request){
        $categories = Category::query()->with(['post' => function ($query) {
            return $query->exists();
        }])->get();
        $tukhoa=$request->tukhoa;
        $tintuc=DB::table('post')->where('title','like','%'.$tukhoa.'%')->orWhere('sub_title','like','%'.$tukhoa.'%')->paginate(5);
        return view('UI.timkiem',compact('tukhoa','tintuc','categories'));

    }
}
