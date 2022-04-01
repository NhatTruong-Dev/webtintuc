<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Category;
use App\Models\Post;
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

        $posts=Post::paginate(5);
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
        return view('post.create',compact('categories'));
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
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $rules = [
            'title' => 'required|unique:post',
            'title_image' => 'required',
            'sub_title' => 'required',
            'category_id' => 'required|integer',
            'details' => 'required'
        ];

        $message=[
            'title.required'=>'• Vui lòng nhập title !',
            'title_image.required'=>'• Vui lòng nhập title_image !',
            'sub_title.required'=>'• Vui lòng nhập sub_title !',
            'category_id.required'=>'• Vui lòng nhập category_id !',
            'category_id.integer'=>'• Category_id là 1 số!',
            'details.required'=>'• Vui lòng nhập details !',
        ];

        $request->validate($rules,$message);

        Post::create($input);

        $data=['title'=>$input['title'],'author'=>auth()->user()->name];
        event(new PostCreated($data));
        $categories=Category::all();
        return redirect()->route('post.index',compact('categories'))->with('success', 'Thêm bài viết thành công');
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

        $post = Post::find($id);
        $categories=Category::all();
        return view('post.edit',compact('categories'))->with('posts', $post);
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
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $post->update($input);
        return redirect()->route('post.index')->with('success', 'Sừa bài viết thành công');
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
        return redirect()->route('post.index')->with('success', 'Xóa bài viết thành công');
    }
}
