<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        // $roles = Role::get();
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admins/roles/index', compact('roles'));
    }
    public function create(){
        return view('admins.roles.create');
    }
    public function store(Request $request){
        $request ->validate([
            'name' => ['required', 'min:3', 'string']
        ]);
        $role = new Role();
        $role -> name = $request->name;
        $role -> save();
        return redirect()->route('admins.roles.index')->with('message', 'Added Successfully');
    }
    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admins.roles.edit', compact('role','permissions'));
    }
    public function update(Request $request, Role $role){
        $request ->validate([
            'name' => ['required', 'min:3', 'string']
        ]);
        $role -> name = $request->name;
        $role -> save();
        return redirect()->route('admins.roles.index')->with('message', 'Updated Successfully');
    }

    public function destroy(Role $role){
        $role -> delete();
        return redirect()->route('admins.roles.index')->with('message', 'The Role Deleted Successfully');

    }
    public function assignPermission(Request $request, Role $role){
        $role->permissions()->sync($request->permissions);
        return back()->with('message','Permission Added Successfully');
    }
}
