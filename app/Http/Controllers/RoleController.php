<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('user-management.roles.index', compact('roles'));
    }
    public function create(){
        $permission = Permission::all();

        return view('user-management.roles.create',compact('permission'));
    }

    public function store(Request $request,){

        $role = Role::create(['name' => $request->name]);
        $permission = $request->permission;

        if(!empty($permission)) {
            //fetch permission names by IDs
            $permissionNames = Permission::whereIn('id', $permission)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        } else {
            // If no permissions are provided, remove all permissions from the role
            $role->syncPermissions([]);
        }

        return redirect()->to('/home');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('user-management.roles.show', compact('role', 'rolePermissions'));
    }
}
