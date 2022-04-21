<?php

namespace App\Http\Controllers;


use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:xem-vai-tro');
        $this->middleware('permission:them-vai-tro', ['only' => ['create','store']]);
        $this->middleware('permission:sua-vai-tro', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-vai-tro', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        $roles = Role::orderBy('id', 'ASC')->paginate(5);
        if($search=request()->search){
            $roles=\App\Models\Role::orderBy('created_at','DESC')->where('name','like','%'.$search.'%')->paginate(5)->appends(request()->query());
        }
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('role.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        Toastr::success('Thêm vai trò thành công');
        return redirect()->route('role.index');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('role.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('role.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        Toastr::success('Sửa vai trò thành công');
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        Toastr::success('Xóa vai trò thành công');
        return redirect()->route('role.index');
    }
}

?>
