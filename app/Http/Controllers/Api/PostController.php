<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;


        if ($request->hasFile('image')) {
            //        $new_name = rand().'.'.$request->file('image')->getClientOriginalExtension();
            //        $request->file('image')->move(public_path('/image'), $new_name);
            //        $link = asset('image/'.$new_name);
            //        return response()->json($link);

            $image = $request->image;
            $profileImage = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('/image'), $profileImage);
            $post->image = $profileImage;
        }

        $post->sub_title = $request->sub_title;
        $post->category_id = $request->category_id;
        $post->details = $request->details;
        $post->title_image = $request->title_image;
        $post->save();
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
//        $this->validate($request, [
//            'title' => 'required',
//            'image' => 'required',
//            'sub_title'=>'required',
//            'category_id'=>'required',
//            'details'=>'required',
//            'title_image'=>'required',
//        ]);
//
//        $post=Post::findOrFail($id);
//        $post->title=$request->input('title');
//        $post->image=$request->input('image');
//        $post->sub_title=$request->input('sub_title');
//        $post->category_id=$request->input('category_id');
//        $post->details=$request->input('details');
//        $post->title_image=$request->input('title_image');
//        $post->save();
//        return $post;

        if ($request->hasFile('image')) {
            //        $new_name = rand().'.'.$request->file('image')->getClientOriginalExtension();
            //        $request->file('image')->move(public_path('/image'), $new_name);
            //        $link = asset('image/'.$new_name);
            //        return response()->json($link);

            $image = $request->image;
            $profileImage = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('/image'), $profileImage);
            $post->image = $profileImage;
        }
        $post->update($request->all());
        return $post;
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
    }
}
