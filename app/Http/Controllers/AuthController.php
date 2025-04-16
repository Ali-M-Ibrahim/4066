<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(){
        $user = new User();
        $user->name= "Admin";
        $user->email="admin@hotmail.com";
        $user->password = Hash::make("123");
        $user->is_admin=true;
        $user->save();


        $user = new User();
        $user->name= "User";
        $user->email="user@hotmail.com";
        $user->password = Hash::make("123");
        $user->is_admin=false;
        $user->save();



        return "ok user created";
    }

    public function login(){
        return View("login");
    }

    public function dologin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route("viewuser");
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function ViewUser(){
        $user = Auth::user();
        return View("ViewUser");
    }


    public function logout(){
        Auth::logout();
        return back();
    }
}
