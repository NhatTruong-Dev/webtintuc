<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\PostContact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
class PostContactController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('contact-form',compact('categories'));
    }
    public function store(Request $request)
    {
        $post = new PostContact;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();
        Toastr::success('Cảm ơn ! Thông tin của bạn đã được gửi đến ban biên tập !');
        return back();
    }
    public function index2(){
        $contact=PostContact::all();
        return view('contact-adm.index',compact('contact'));
    }
    public function show($id){
        $contact=PostContact::find($id);
        return view('contact-adm.show',compact('contact'));
    }
}
?>
