<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthManager extends Controller
{
    public function login(){
        return view('login');
    }

    public function adminLogin(){
        return view('admin');
    }
    
    public function register(){
        return view('registration');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect()->intended(route('register'))->with("Error");
    }
    
    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            if(!$user){
                return redirect()->intended(route('register'))->with("Error");
            }
            return redirect()->intended(route('login'))->with("Error");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/')->with('success', 'You have been logged out.');
    }

    public function adminLoginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->intended(route('adminPredstave'));
        }
        return redirect()->intended(route('adminLogin'))->with("Error");
        
    }
}
