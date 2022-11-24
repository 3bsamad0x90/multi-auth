<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::get();
        return view('admins.permissions.index', compact('permissions'));
    }
    public function create(){
        return view('admins.permissions.create');
    }
    public function store(Request $request){
        $request ->validate([
            'name' => ['required', 'min:3', 'string']
        ]);
        $permission = new Permission();
        $permission -> name = $request->name;
        $permission -> save();
        return redirect()->route('admins.permissions.index')->with('message', 'Added Successfully');
    }
    public function edit(Permission $permission){
        return view('admins.permissions.edit', compact('permission'));
    }
    public function update(Request $request, Permission $permission){
        $request ->validate([
            'name' => ['required', 'min:3', 'string']
        ]);
        $permission -> name = $request->name;
        $permission -> save();
        return redirect()->route('admins.permissions.index')->with('message', 'Updated Successfully');
    }
    public function destroy(Permission $permission){
        $permission -> delete();
        return redirect()->route('admins.permissions.index')->with('message', 'The Permission Deleted Successfully');

    }
}
