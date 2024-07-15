<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Predstava;


class AdminController extends Controller
{
    public function adminPredstave(){
        $posts = DB::table('predstava')->get();
        $istaknuti = DB::table('istaknuto')->get();
        return view('adminPredstave',[
            'posts' => $posts,
            'istaknuti'=>$istaknuti
        ]);
    }

    public function adminRepertoar(){
        $posts = DB::table('repertoar')->get();
        $predstave = DB::table('predstava')->get();
        return view('adminRepertoar',[
            'posts' => $posts,
            'predstave' => $predstave
        ]);
    }

    public function adminRepertoarDodaj(Request $request){
        DB::table('repertoar')->insert([
            'predstava_id' => $request->predstava,
            'datum_vreme' => $request->datum_vrijeme
        ]);
        return redirect()->intended(route('adminRepertoar'));
    }

    public function adminPredstavePost(Request $request){
        $request->validate([
            'name' => 'required',
            'reziser' => 'required',
        ]);
        $predstava = new Predstava();
        $predstava->naziv = $request->input('name');
        $predstava->reziser = $request->input('reziser');
        $file = $request->file('slika');
        $filePath="images/".$file->getClientOriginalName();
        $request->file('slika')->storeAs('public/images',$filePath);
        $predstava->slika = $filePath;
        $predstava->save();
        return redirect()->intended(route('adminPredstave')); 
    }

    public function adminPredstaveIzbrisi($request){
        $predstava = Predstava::find((int)$request);
        $predstava->delete();
        return redirect()->intended(route('adminPredstave')); 
    }

    public function adminRepertoarIzbrisi($id){
        DB::table('repertoar')->where('id','=',$id)->delete();
        return redirect()->intended(route('adminRepertoar')); 
    }

    public function adminDodajeGlumcePredstavi($id){
        $posts = DB::table('glumci')->get();
        $glume = DB::table('glumi_u_predstavi')->where('predstava_id','=',$id)->get();
        return view('adminDodajGlumca',[
            'id_pred' =>$id,
            'posts' => $posts,
            'glume' => $glume
        ]);
    }

    public function adminDodajeGlumcePredstaviIzbrisi($id,$id2){
        DB::table('glumi_u_predstavi')->where('glumac_id','=',$id)->where('predstava_id','=',$id2)->delete();
        return redirect()->intended(route('adminDodajeGlumcePredstavi', $id2));
    }

    public function adminDodajeGlumcePredstaviDodaj($id,Request $request){
        $posts = DB::table('glumci')->get();
        DB::table('glumi_u_predstavi')->insert([
            'glumac_id' => $request->input('id_glumca'),
            'predstava_id' => $request->input('id_predstave'),
        ]);
        $glume = DB::table('glumi_u_predstavi')->where('predstava_id','=',$id)->get();
        return view('adminDodajGlumca',[
            'id_pred' =>$id,
            'posts' => $posts,
            'glume' => $glume
        ]);
    }

    public function adminPredstavaIstakni($id){
        DB::table('istaknuto')->insert([
            'predstava_id' => $id,
        ]);
        return redirect()->intended(route('adminPredstave'));
    }

    public function adminPredstavaIzbaci($id){
        DB::table('istaknuto')->where('predstava_id','=',$id)->delete();
        return redirect()->intended(route('adminPredstave'));
    }
}
