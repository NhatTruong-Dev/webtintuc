<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:xem-danh-muc');
        $this->middleware('permission:tao-danh-muc', ['only' => ['create','store']]);
        $this->middleware('permission:sua-danh-muc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-danh-muc', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = DB::table('category')->get();
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:category|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục !',
            'name.unique' => 'Đã tồn tại tên danh mục ! Vui lòng nhập tên khác',
        ]);


        $data = Category::create(["name" => $request->post('name')]);


        return redirect()->route('category.index',compact('data'))->with('success', 'Thêm danh mục thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = Category::find($id);
        return view('category.show')->with('categories', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('category.edit')->with('categories', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $input = $request->all();
        $category->update($input);
        return redirect()->route('category.index')->with('success', 'Sửa danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::destroy($id);

        return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
    }
}
