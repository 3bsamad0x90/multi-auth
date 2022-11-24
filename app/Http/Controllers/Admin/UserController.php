<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){

        return view('home');
    }
    public function index(){
        $users = User::all()->except(\Auth::id());
        return view('admins.users.index', compact('users'));
    }
    public function edit(User $user){
        $roles = Role::all();
        return view('admins.users.edit', compact('user', 'roles'));
    }
    public function update(UserUpdateRequest $request, User $user){
        if($request->hasFile('photo')){
            $file_path = '/public/images/'. $user->photo;
            \Storage::delete($file_path);
            $image = $request->file('photo');
            $name = uniqid() . \Str::random(45) . '.' . $image->getClientOriginalExtension();
            $destination_path = public_path('/images');
            $image->move($destination_path, $name);
            $imagePath = 'images/' . $name;
            $user -> photo = $imagePath;
        }
        $user->update($request->validated());
        return redirect()->route('admins.users.index')->with('message','Updated Successfully');
    }
    public function destroy(User $user){
        $user -> delete();
        return redirect()->route('admins.users.index')->with('message', 'The User Deleted Successfully');
    }
}
