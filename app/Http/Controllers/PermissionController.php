<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('user-management.permission.index', compact('permissions'));
    }
    public function create()
    {
        return view('user-management.permission.create');
    }
    public function store(Request $request,)
    {
        if ($request->checked == "off") {
            Permission::create([
                'name' => $request->name
            ]);
        } else if ($request->checked == "on") {
            // get all the basic permissions
            $permissions = [
                'list',
                'create',
                'edit',
                'delete',
                'restore',
                'show',
            ];

            foreach ($permissions as $permission) {
                Permission::updateOrCreate(['name' => $request->name . '-' . $permission]);
            }
        }

        return redirect()->route('permission.index');
    }
}
