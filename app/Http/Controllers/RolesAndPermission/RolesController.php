<?php

namespace App\Http\Controllers\RolesAndPermission;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{


    /**
     * RolesController constructor.
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {

        $roles = Role::all();

        return view('RolesAndPermission.roles.index', compact('roles'));
    }

    public function create()
    {
        $admin = Admin::all();
        $permission = Permission::get();
        return view('RolesAndPermission.roles.create', compact('admin','permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'role' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        // Assign Role ==> MODEL HAS ROLE
        $user = Admin::findorFail($request->role);
        $user->assignRole($request->input('role'));

        // Permission ==> ROLE HAS PERMISSIONS
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $admin = Admin::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('RolesAndPermission.roles.edit', compact('admin','role','permissions','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'role' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::findorFail($id);
        $role->name = $request->input('name');
        $role->save();

        $user = Admin::findorFail($request->role);
        $user->assignRole($request->input('role'));

        // Permission ==> ROLE HAS PERMISSIONS
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();

        return redirect()->route('roles.index');
    }


}
