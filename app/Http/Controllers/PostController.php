<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Category;
use App\Models\Post;
use App\Models\Thematic;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Hash;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:xem-bai-viet');
        $this->middleware('permission:them-bai-viet', ['only' => ['create','store']]);
        $this->middleware('permission:sua-bai-viet', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-bai-viet', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(10);
        if($search=request()->search){
            $posts=Post::orderBy('created_at','DESC')->where('title','like','%'.$search.'%')->paginate(5)->appends(request()->query());
        }
        return view('post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $thematics=Thematic::all();
        return view('post.create',compact('categories','thematics'));
        Toastr::success('Thêm thành công','Success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        if ($image = $request->file('image')) {
            $profileImage = time(). "." . $image->getClientOriginalExtension();
            $image->move(public_path(), $profileImage);
            $input['image'] = "$profileImage";
        }

        $rules = [
            'title' => 'required|unique:post',
            'sub_title' => 'required',
            'category_id' => 'required|integer',
            'details' => 'required',
        ];

        $message=[
            'title.required'=>'• Vui lòng nhập tiêu đề !',
            'sub_title.required'=>'• Vui lòng nhập phụ đề !',
            'category_id.required'=>'• Vui lòng nhập category_id !',
            'category_id.integer'=>'• Category_id là 1 số!',
            'details.required'=>'• Vui lòng nhập nội dung !',
        ];

        $request->validate($rules,$message);

        Post::create($input);

//        $data=['title'=>$input['title'],'author'=>auth()->user()->name];
//        event(new PostCreated($data));
        Toastr::success('Thêm bài viết thành công');
        $categories=Category::all();
        $thematics=Thematic::all();

        return redirect()->route('post.index',compact('categories','thematics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return view('post.show')->with('posts', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thematics=Thematic::all();
        $posts = Post::find($id);
        $categories=Category::all();

        return view('post.edit',compact('categories','thematics','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::find($id);
        $input = $request->all();

        $post->update($input);
            Toastr::success('Sửa bài viết thành công');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        Toastr::success('Xóa bài viết thành công');
        return redirect()->route('post.index');
    }

}
