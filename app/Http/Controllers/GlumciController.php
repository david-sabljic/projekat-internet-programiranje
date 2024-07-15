<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Glumac;

class GlumciController extends Controller
{
    public function adminGlumci(){
        $posts = DB::table('glumci')->get();
        return view('adminGlumci',[
            'posts' => $posts
        ]);
    }

    public function adminGlumciPost(Request $request){
        $request->validate([
            'name' => 'required',
            'prezime' => 'required',
        ]);
        $glumac = new Glumac();
        $glumac->ime = $request->input('name');
        $glumac->prezime = $request->input('prezime');
        $glumac->save();
        return redirect()->intended(route('adminGlumci'));
    }

    public function adminGlumciIzbrisi($request){
        $glumac = Glumac::find((int)$request);
        $glumac->delete();
        return redirect()->intended(route('adminGlumci')); 
    }
}
