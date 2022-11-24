<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function save(){
        return view('login');
    }
    public function store(Request $request){
        if(is_numeric($request->get('email'))){
            $request->validate([
                'email' => ['required','exists:users,phone'],
                'password' => ['required']
            ],
            [
                'email.exists' => 'Invalid Credentials',
                'email.required' => 'Email or Phone field is required',
                'password.required' => 'password field is required',
            ]);
           $cred = array('phone' => $request->email, 'password' => $request->password);
           if(Auth::attempt($cred)){
                return  redirect()->route('posts.index');
           }
        }
        $request->validate([
            'email' => ['required','exists:users,email'],
            'password' => ['required']
        ],
        [
            'email.exists' => 'Invalid Credentials',
            'email.required' => 'Email or Phone field is required',
            'password.required' => 'password field is required'
        ]);
        $cred = array('email' => $request->email, 'password' => $request->password);
        if(Auth::attempt($cred)){
            return  redirect()->route('posts.index');
       }
       return back();
    }
}
