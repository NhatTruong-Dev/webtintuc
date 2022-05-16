<?php

namespace App\Http\Controllers;

use App\Models\Thematic;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThematicController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:xem-chuyen-de');
        $this->middleware('permission:them-chuyen-de', ['only' => ['create','store']]);
        $this->middleware('permission:sua-chuyen-de', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-chuyen-de', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $thematics = DB::table('thematic')->get();
        if($search=request()->search){
            $thematics=Thematic::orderBy('created_at','DESC')->where('name','like','%'.$search.'%')->paginate(5);
        }
        return view('thematic.index')->with('thematics', $thematics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thematic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:category|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên chuyên đề !',
            'name.unique' => 'Đã tồn tại tên chuyên đề ! Vui lòng nhập tên khác',
        ]);


        $data = Thematic::create(["name" => $request->post('name')]);

        Toastr::success('Thêm chuyên đề thành công');
        return redirect()->route('thematic.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thematic = Thematic::find($id);
        return view('thematic.show')->with('thematic', $thematic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thematic = Thematic::find($id);
        return view('thematic.edit')->with('thematic', $thematic);
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
        $thematic = Thematic::find($id);
        $input = $request->all();
        $thematic->update($input);
        Toastr::success('Sửa chuyên đề thành công');
        return redirect()->route('thematic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thematic::destroy($id);
        Toastr::success('Xóa chuyên đề thành công');
        return redirect()->route('thematic.index');
    }
}
