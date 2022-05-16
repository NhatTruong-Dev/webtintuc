<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Thematic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $categories=Category::count();
        $post=Post::count();
        $user=User::count();
        $thematic=Thematic::count();
        $chartPost=Post::select(\DB::raw("COUNT(*) as count"))
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(\DB::raw("Month(created_at)"))
                        ->pluck('count');
        $posts = Post::query()->latest()->limit(10)->get();
        return view('dashboard',compact('chartPost','categories','user','post','thematic','posts'));


    }

}
