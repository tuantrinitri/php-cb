<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $login =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('admin.index'); // goi name route
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}