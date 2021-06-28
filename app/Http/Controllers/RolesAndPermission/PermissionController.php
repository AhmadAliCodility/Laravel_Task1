<?php

namespace App\Http\Controllers\RolesAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        $permission = Permission::all();
        return view('RolesAndPermission.Permissions.index',compact('permission'));
    }

    public function create()
    {
        return view('RolesAndPermission.Permissions.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $role = Permission::create(['name' => $request->input('name')]);


        return redirect()->route('permissions.index');
    }


    public function edit(Permission $permission)
    {
        return view('RolesAndPermission.Permissions.edit',compact('permission'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $role = Permission::where('id',$id)->update([
            'name' => $request->input('name')
        ]);


        return redirect()->route('permissions.index');
    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();

        return redirect()->route('permissions.index');
    }



}
