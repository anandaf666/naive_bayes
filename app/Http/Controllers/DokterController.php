<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use App\Models\Janji;
class DokterController extends Controller
{
    //
    public function tambah_dokter(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                   return view('admin.tambah_dokter');
            }
            else {
            return redirect()->back();
        } 
    }
        else {
        return redirect('login');
        }
    }

    public function upload_dokter(Request $request){
        $dokter = new dokter;

        $image = $request->file;
        $imagename = time().'.'.$image->getClientoriginalExtension();


        $request->file->move('gambar_dokter', $imagename);
        $dokter->gambar=$imagename;

        $dokter->nama=$request->nama;
        $dokter->kontak=$request->kontak;
        $dokter->alamat=$request->alamat;
        $dokter->spesialis=$request->spesialis;

        $dokter->save();

        return redirect()->back()->with('message','Berhasil Memasukkan Data Dokter');
    }
    
}