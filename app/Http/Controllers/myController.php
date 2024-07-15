<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class myController extends Controller
{
    public function index(){
        $posts = DB::table('predstava')->get();
        $istaknuti = DB::table('istaknuto')->get();
        return view('home',[
            'posts' => $posts,
            'istaknuti'=>$istaknuti
        ]);
    }

    public function index2(){
        return view('about');
    }

    public function index3(){
        $posts = DB::table('predstava')->get();
        return view('predstave',[
            'posts' => $posts
        ]);
    }

    public function oPredstavi($id){
        $posts = DB::table('predstava')->where('id','=',$id)->get();
        return view('predstava',[
            'posts'=>$posts,
        ]);
    }

    public function show($id)
    {
        $repertoar = DB::table('repertoar')
            ->join('predstava', 'repertoar.predstava_id', '=', 'predstava.id')
            ->where('repertoar.id', $id)
            ->select('repertoar.*', 'predstava.naziv', 'predstava.reziser', 'predstava.slika')
            ->first();

        return view('rezervacija', compact('repertoar'));
    }

    public function reserve(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'repertoar_id' => 'required|exists:repertoar,id',
            'broj_karata' => 'required|integer|min:1|max:10'
        ]);

        // Check current reservations
        $currentReservations = DB::table('rezervacije')
            ->where('repertoar_id', $request->repertoar_id)
            ->sum('broj_karata');

        if ($currentReservations + $request->broj_karata > 200) {
            return redirect()->back()->withErrors('Nema dovoljno dostupnih karata za ovu predstavu.');
        }

        // Insert the reservation
        DB::table('rezervacije')->insert([
            'user_id' => $request->user_id,
            'repertoar_id' => $request->repertoar_id,
            'broj_karata' => $request->broj_karata,
        ]);

        return redirect()->route('repertoar')->with('success', 'Rezervacija je uspješno kreirana!');
    }

    public function repertoar()
        {
            $repertoars = DB::table('repertoar')
            ->join('predstava', 'repertoar.predstava_id', '=', 'predstava.id')
            ->select('repertoar.*', 'predstava.naziv', 'predstava.reziser', 'predstava.slika')
            ->get();

            return view('repertoar', compact('repertoars'));
        }

    public function rezervacije(){
        $user_id = auth()->user()->id;
        $rezervacije = DB::table('rezervacije')
            ->join('repertoar', 'rezervacije.repertoar_id', '=', 'repertoar.id')
            ->join('predstava', 'repertoar.predstava_id', '=', 'predstava.id')
            ->where('rezervacije.user_id', $user_id)
            ->select('rezervacije.*', 'predstava.naziv', 'repertoar.datum_vreme')
            ->get();

        return view('rezervacije', compact('rezervacije'));
    }

    public function otkazi($id){
        DB::table('rezervacije')->where('id','=',$id)->delete();
        return redirect()->intended(route('rezervacije'));
    }
}
