<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Aws\Api\Validator;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request  $request)
    {
        $image=$request->file('image');
        if($request->hasFile('image')){
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/image'),$new_name);
            return response()->json('Image null');
        }else{
            return response()->json('Image null');
        }
    }
}
