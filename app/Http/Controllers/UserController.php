<?php
namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function index(Request $request)
    {

        $data = User::orderBy('id', 'DESC')->paginate(5);
        if($search=request()->search){
            $data=User::orderBy('created_at','DESC')->where('name','like','%'.$search.'%')->paginate(5)->appends(request()->query());
        }
        return view('users.index', compact('data'));
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required'
        ],[
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.email' => 'Email sai định dạng',
            'role.required'=>'Vai trò không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
            'password.same'=>'Mật khẩu nhập lại không đúng',
            'email.unique' => 'Email đã tồn tại',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role'));
        Toastr::success('Thêm người dùng thành công');
        return redirect()->route('users.index');

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'role' => 'required'
        ],[
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email sai định dạng',
            'role.required'=>'Vai trò không được để trống',
            'password.same'=>'Mật khẩu nhập lại không đúng'

        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('role'));
        Toastr::success('Sửa thông tin người dùng thành công');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        Toastr::success('Xóa người dùng thành công');
        return redirect()->route('users.index');
    }
}

?>
