<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NaloziController extends Controller
{
    public function adminNalozi(){
        $posts = DB::table('admins')->get();
        return view('adminNalozi',[
            'posts' => $posts,
        ]);
    }

    public function adminNaloziPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
        ]);
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('email'));
        $admin->save();
        return redirect()->intended(route('adminNalozi'));
    }

    public function adminNaloziIzbrisi($request){
        $admin = Admin::find((int)$request);
        $admin->delete();
        return redirect()->intended(route('adminNalozi')); 
    }

    public function userNalozi(){
        $tosts = DB::table('users')->get();
        return view('korisnickiNalozi',[
            'tosts' => $tosts,
        ]);
    }

    public function userNaloziPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('email'));
        $user->save();
        return redirect()->intended(route('userNalozi'));
    }

    public function userNaloziIzbrisi($request){
        $user = User::find((int)$request);
        $user->delete();
        return redirect()->intended(route('userNalozi')); 
    }
}
