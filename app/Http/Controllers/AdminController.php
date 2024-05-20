<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Janji;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\relasi;
use App\Models\Solusi;

class AdminController extends Controller
{
    //
    public function index(){
        if(Auth::id()){
            $user_type = Auth()->user()->usertype;
        
            if ($user_type == 'user'){
                $dokter = dokter::all();
                return view('home.index', compact('dokter'));
        }
            else if ($user_type == 'admin'){
                return view('admin.index');
        }
    }
        else {
            return redirect()->back();
        }
    }

    public function home(){

        if(Auth::id()){
            return redirect('home');
        }
        else{
            $dokter = dokter::all();

        return view('home.index', compact('dokter'));
        }
        
    }
    
    public function janji(Request $request){
        $data = new janji;
        
        $data->nama=$request->nama;
        $data->email=$request->email;
        $data->tanggal=$request->tanggal;
        $data->kontak=$request->kontak;
        $data->dokter=$request->dokter;
        $data->pesan=$request->pesan;
        $data->status='in Progress';
        if (Auth::id()){
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Berhasil Membuat Janji !');
    }
    public function janji_saya(){
        if(Auth::id()){
            if (Auth::user()->usertype == 'user'){
            $userid = Auth::user()->id;
            $janji = janji::where('user_id', $userid)->get();

            return view('home.janjisaya', compact('janji'));
            }
            else{
                return redirect()->back();
            }
        }
        else {
            return redirect('login');
        }

    }

    public function batal_janji($id){

        $data = janji::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function show_janji(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                
        $janji= janji::all();
        return view('admin.show_janji', compact('janji'));
    }
            else {
                return redirect()->back();
        }
    }
    else {
        return redirect('login');
    }
}

    public function setuju($id){

        $data = janji::find($id);

        $data->status='disetujui';
        $data->save();

        return redirect()->back();
    }
    public function batal($id){

        $data = janji::find($id);

        $data->status='dibatalkan';
        $data->save();

        return redirect()->back();
    }
    public function show_dokter(){
        $dokter= dokter::all();
        return view('admin.show_dokter', compact('dokter'));
    }
    public function hapus_dokter($id){

        $data = dokter::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function update_dokter($id){
        $data = dokter::find($id);
        return view('admin.edit_dokter', compact('data'));
    }
    public function edit_dokter(Request $request ,$id){
        $data = dokter::find($id);
        $data->nama=$request->nama;
        $data->kontak=$request->kontak;
        $data->alamat=$request->alamat;
        $data->spesialis=$request->spesialis;
        $image = $request->file;
        if($image){
        $imagename = time().'.'.$image->getClientoriginalExtension();


        $request->file->move('gambar_dokter', $imagename);
        $data->gambar=$imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Data Dokter telah diupdate !');
    }

    public function email_view($id){
        $data = janji::find($id);
        return view('admin.email_view', compact('data'));
    }

    public function kirim_email(Request $request, $id){
        $data = janji::find($id);

        $details = [
            'greeting'=> $request->greeting,
            'body' => $request->body,
            'aksiteks' => $request->aksiteks,
            'aksiurl' => $request->aksiurl,
            'bagianakhir' => $request->bagianakhir,
        ];

        Notification::send($data, new SendEmailNotification($details));
        
        return redirect()->back()->with('message', 'Email telah terkirim !');
    }
    public function show_penyakit(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                
        $penyakit= Penyakit::all();
        //dd($penyakit);
        return view('admin.show_penyakit', compact('penyakit'))->with('i');
    }
            else {
                return redirect()->back();
        }
    }
    else {
        return redirect('login');
    }
    }
    public function tambah_penyakit(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                   return view('admin.tambah_penyakit');
            }
            else {
            return redirect()->back();
        } 
    }
        else {
        return redirect('login');
        }
    }
    public function upload_penyakit(Request $request){
        $penyakit = new Penyakit;

        $penyakit->nama_penyakit=$request->nama_penyakit;
        $penyakit->save();

        return redirect()->back()->with('message','Berhasil Memasukkan Data Penyakit');
    }
    public function hapus_penyakit($id){

        $data = penyakit::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function update_penyakit($id){
        $data = penyakit::find($id);
        return view('admin.edit_penyakit', compact('data'));
    }
    public function edit_penyakit(Request $request ,$id){
        $data = penyakit::find($id);
        $data->nama_penyakit=$request->nama_penyakit;

        $data->save();

        return redirect()->back()->with('message', 'Data Penyakit telah diupdate !');
    }
    public function show_relasi(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                
        $relasi = relasi::all();
        //dd($relasi);
        return view('admin.show_relasi', compact('relasi'));
    }
            else {
                return redirect()->back();
        }
    }
    else {
        return redirect('login');
    }
    }
    public function tambah_relasi(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                $penyakit = penyakit::all();
                $gejala = gejala::all();
                   return view('admin.tambah_relasi', compact('penyakit', 'gejala'));
            }
            else {
            return redirect()->back();
        } 
    }
        else {
        return redirect('login');
        }
    }
    public function upload_relasi(Request $request){
        $relasi = new Relasi;

        $relasi ->penyakit_id=$request->penyakit_id;
        $relasi ->gejala_id=$request->gejala_id;
        $relasi ->save();

        return redirect()->back()->with('message','Berhasil Memasukkan Data Relasi');
    }
    public function hapus_relasi($id){

        $data = relasi::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function update_relasi($id){
        $penyakit = penyakit::all();
        $gejala = gejala::all();
        $data = relasi::find($id);
        return view('admin.edit_relasi', compact('data', 'penyakit', 'gejala'));
    }
    public function edit_relasi(Request $request ,$id){
        $data = relasi::find($id);
        $data->penyakit_id=$request->penyakit_id;
        $data ->gejala_id=$request->gejala_id;
        $data->save();

        return redirect()->back()->with('message', 'Data Relasi telah diupdate !');
    }
    public function show_gejala(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                
        $gejala = gejala::all();
        //dd($gejala);
        return view('admin.show_gejala', compact('gejala'));
    }
            else {
                return redirect()->back();
        }
    }
    else {
        return redirect('login');
    }
    }
    public function tambah_gejala(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                   return view('admin.tambah_gejala');
            }
            else {
            return redirect()->back();
        } 
    }
        else {
        return redirect('login');
        }
    }
    public function upload_gejala(Request $request){
        $gejala = new Gejala;

        $gejala ->nama_gejala=$request->nama_gejala;
        $gejala ->save();

        return redirect()->back()->with('message','Berhasil Memasukkan Data Gejala');
    }
    public function hapus_gejala($id){

        $data = gejala::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function update_gejala($id){
        $data = gejala::find($id);
        return view('admin.edit_gejala', compact('data'));
    }
    public function edit_gejala(Request $request ,$id){
        $data = gejala::find($id);
        $data->nama_gejala=$request->nama_gejala;

        $data->save();

        return redirect()->back()->with('message', 'Data Gejala telah diupdate !');
    }
    public function show_solusi(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
              
        $solusi = solusi::all();
        //dd($solusi); 
        return view('admin.show_solusi', compact('solusi'));
    }
            else {
                return redirect()->back();
        }
    }
    else {
        return redirect('login');
    }
    
    }
    public function tambah_solusi(){
        if(Auth::id()){
        
            if (Auth::user()->usertype == 'admin'){
                $penyakit = penyakit::all();
                   return view('admin.tambah_solusi', compact('penyakit'));
            }
            else {
            return redirect()->back();
        } 
    }
        else {
        return redirect('login');
        }
    }
    public function upload_solusi(Request $request){
        $solusi = new solusi;

        $solusi ->penyakit_id=$request->penyakit_id;
        $solusi ->solusi = $request->solusi;
        $solusi ->save();

        return redirect()->back()->with('message','Berhasil Memasukkan Data Solusi');
    }
    public function hapus_solusi($id){

        $data = solusi::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function update_solusi($id){
        $penyakit = penyakit::all();
        $data = solusi::find($id);
        return view('admin.edit_solusi', compact('data', 'penyakit'));
    }
    public function edit_solusi(Request $request ,$id){
        $data = solusi::find($id);
        $data->penyakit_id=$request->penyakit_id;
        $data ->solusi=$request->solusi;
        $data->save();

        return redirect()->back()->with('message', 'Data Solusi telah diupdate !');
    }
}

