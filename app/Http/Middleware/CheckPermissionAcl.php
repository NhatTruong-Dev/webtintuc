<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$permission =null)
    {
        $listRoleofUser= DB::table('users')
            ->join('roles_user', 'users.id', '=', 'roles_user.user_id')
            ->join('role', 'roles_user.role_id', '=', 'role.id')
            ->where('users.id',auth()->id())
            ->select('role.*')
            ->get()->pluck('id')->toArray();

        $listRoleofUser= DB::table('role')
            ->join('role_permission', 'role.id', '=', 'role_permission.role_id')
            ->join('permissions', 'role_permission.permission_id', '=', 'permissions.id')
            ->whereIn('role.id',$listRoleofUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique;

        $checkPermission=Permission::where('name',$permission)->first();
        dd($checkPermission);
        return $next($request);
    }
}
