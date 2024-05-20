<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Solusi;
use App\Models\Relasi;

class NBController extends Controller
{
    //
    public function konsultasi()
    {
        //
        if(Auth::id()){
            if (Auth::user()->usertype == 'user'){
            $userid = Auth::user()->id;
            $gejala = Gejala::all();
        
        return view('home.konsultasi',compact('gejala'))
                    ->with('i');
            }else{
                return redirect()->back();
            }
        }
        else {
            return redirect('login');
        }
    }
    public function hitung_nb(Request $request)
    {
        //
        $gejala_id = $request->gejala_id;
        
        $selected_penyakit = array();
        $solusis = Solusi::all();
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        $n = 1;
        $m = count($gejalas);
        $x = count($penyakits);
        $pvj = 1/$x;
        $nc = array();
        $P = array();
        $Pfinal = array();
        $collection_penyakit = array();
        foreach ($penyakits as $key => $penyakit){
            
            $collection_penyakit[$key] = $penyakit->id;
            //dd($penyakits);
            //dd($collection_penyakit[$key]);
            $Pfinal[$key] = 1;
            
            foreach($gejala_id as $gkey => $gejala){
                //dd($gejala);
                $relasi = Relasi::select('gejala_id')->where('penyakit_id','=',$penyakit->id)
                ->where('gejala_id','=', $gejala)->first();
               
                //dd($relasi);
                if(!empty($relasi)){
                    $nc[$key][$gkey] = 1;
                    
                }else{
                    $nc[$key][$gkey] = 0;
                }
                
                $P[$key][$gkey] = round(($nc[$key][$gkey] + ($m*$pvj))/($n+$m), 9);
                //dd($P[$key][$gkey]);
                $Pfinal[$key] =  $Pfinal[$key] * $P[$key][$gkey];
                //dd($Pfinal[$key]);
                
            }
                $Pfinal[$key] = round(($pvj * $Pfinal[$key]),15);
            }
                //dd($Pfinal);
                $maxPfinal = max($Pfinal);
            //dd($maxPfinal);
            //dd($solusi);
            
            $index = 0;
            foreach($Pfinal as $key => $value){
                //dd($values);
                if($value == $maxPfinal){
                    $index = $key;
                    //dd($Pfinal);
                    //dd($key);
                    //dd($index);
                   
            }
            $solusi = Solusi::select('solusi')->where('penyakit_id','=',$penyakit->id)->get();
        }
        //dd($solusi);  
        return view('home.hasil', compact('penyakits','penyakit','gejalas', 'gejala_id', 'Pfinal', 'key','maxPfinal','index','solusis' , 'solusi'))->with('i');
    }
}
