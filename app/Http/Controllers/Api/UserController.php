<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();
        return $user;
    }
    public function show($id){
        return User::findOrFail($id);
    }
    public function update(Request $request,User $user){
        $user->update($request->all());
        return $user;
    }
    public function destroy($id){
        User::destroy($id);
    }
}
