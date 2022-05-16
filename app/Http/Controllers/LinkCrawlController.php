<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LinkCrawler;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LinkCrawlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = LinkCrawler::all();

        return view('crawl.index',compact('link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('crawl.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link_category' => 'required|unique:link_crawler',
        ], [
            'link_category.required' => 'Vui lòng nhập tên link !',
            'link_category.unique' => 'Đã tồn tại tên link! Vui lòng nhập tên khác',
        ]);

        $data = new LinkCrawler;
        $data->category_id = $request->category_id;
        $data->link_category = $request->link_category;
        $data->save();

        Toastr::success('Thêm link thành công');
        return redirect()->route('crawl.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = LinkCrawler::find($id);
        $categories=Category::all();
        return view('crawl.edit',compact('categories','link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkCrawler $link)
    {
        $request->validate([
            'link_category' => 'required|unique:link_crawler|max:255',
        ], [
            'link_category.required' => 'Vui lòng nhập tên link !',
            'link_category.unique' => 'Đã tồn tại tên link ! Vui lòng nhập tên khác',
        ]);

        $link->update($request->all());

        return redirect()->route('crawl.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LinkCrawler::destroy($id);
        Toastr::success('Xóa link thành công');
        return redirect()->route('crawl.index');
    }
}
