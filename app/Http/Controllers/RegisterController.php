<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function save(){
        return view('register');
    }
    public function store(RegisterRequest $request){
        $user = new User();
        $user -> role_id = 1;
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> phone = $request->phone;
        $user -> password = \Hash::make($request->password);
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name = uniqid() . \Str::random(45) . '.' . $image->getClientOriginalExtension();
            $destination_path = public_path('/images');
            $image->move($destination_path, $name);
            $imagePath = 'images/' . $name;
            $user -> photo = $imagePath;
        }
        $user-> save();
        return redirect()->route('login');
    }
}
