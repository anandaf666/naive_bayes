<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\NBController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('home.welcome');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/tambah_dokter', [DokterController::class, 'tambah_dokter']);
route::post('/tambah_dokter_upload', [DokterController::class, 'upload_dokter']);
route::get('/tambah_penyakit', [AdminController::class, 'tambah_penyakit']);
route::post('/tambah_penyakit_upload', [AdminController::class, 'upload_penyakit']);
route::get('/tambah_gejala', [AdminController::class, 'tambah_gejala']);
route::post('/tambah_gejala_upload', [AdminController::class, 'upload_gejala']);
route::get('/tambah_relasi', [AdminController::class, 'tambah_relasi']);
route::post('/tambah_relasi_upload', [AdminController::class, 'upload_relasi']);
route::get('/tambah_solusi', [AdminController::class, 'tambah_solusi']);
route::post('/tambah_solusi_upload', [AdminController::class, 'upload_solusi']);
route::get('/home', [AdminController::class, 'index'])->middleware('auth','verified');
route::get('/', [AdminController::class, 'home']);
route::post('/janji', [AdminController::class, 'janji']);
route::get('/janjisaya', [AdminController::class, 'janji_saya']);
route::get('/batal_janji/{id}', [AdminController::class, 'batal_janji']);
route::get('/show_janji', [AdminController::class, 'show_janji']);
route::get('/show_penyakit', [AdminController::class, 'show_penyakit']);
route::get('/show_gejala', [AdminController::class, 'show_gejala']);
route::get('/show_relasi', [AdminController::class, 'show_relasi']);
route::get('/show_solusi', [AdminController::class, 'show_solusi']);
route::get('/show_dokter', [AdminController::class, 'show_dokter']);
route::get('/disetujui/{id}', [AdminController::class, 'setuju']);
route::get('/dibatalkan/{id}', [AdminController::class, 'batal']);
route::get('/update_dokter/{id}', [AdminController::class, 'update_dokter']);
route::get('/hapus_dokter/{id}', [AdminController::class, 'hapus_dokter']);
route::get('/update_penyakit/{id}', [AdminController::class, 'update_penyakit']);
route::get('/hapus_penyakit/{id}', [AdminController::class, 'hapus_penyakit']);
route::get('/update_gejala/{id}', [AdminController::class, 'update_gejala']);
route::get('/hapus_gejala/{id}', [AdminController::class, 'hapus_gejala']);
route::get('/update_relasi/{id}', [AdminController::class, 'update_relasi']);
route::get('/hapus_relasi/{id}', [AdminController::class, 'hapus_relasi']);
route::get('/update_solusi/{id}', [AdminController::class, 'update_solusi']);
route::get('/hapus_solusi/{id}', [AdminController::class, 'hapus_solusi']);
route::get('/email_view/{id}', [AdminController::class, 'email_view']);
route::post('/edit_dokter/{id}', [AdminController::class, 'edit_dokter']);
route::post('/edit_penyakit/{id}', [AdminController::class, 'edit_penyakit']);
route::post('/edit_gejala/{id}', [AdminController::class, 'edit_gejala']);
route::post('/edit_relasi/{id}', [AdminController::class, 'edit_relasi']);
route::post('/edit_solusi/{id}', [AdminController::class, 'edit_solusi']);
route::post('/kirim_email/{id}', [AdminController::class, 'kirim_email']);
Route::get('/konsultasi', [NBController::class, 'konsultasi'])->name('home.konsultasi');
Route::post('konsultasi/hasil', [NBController::class, 'hitung_nb'])->name('home.hasil');