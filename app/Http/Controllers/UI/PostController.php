<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Post as PostModel;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index()
    {
        return view('UI.Category');
    }


    public function show($id)
    {
        $post = PostModel::query()->find($id);
        return view('UI.Post', compact('post'));
    }

}
