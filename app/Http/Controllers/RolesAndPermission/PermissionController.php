<?php

namespace App\Http\Controllers\RolesAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
//        $this->middleware('role:admin');
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


    public function edit($id)
    {

    }



}
