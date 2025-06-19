<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\pengajarController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\pesertaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Middleware\Peran;
use GuzzleHttp\Middleware;

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

// ======================= Layout =======================

Route::get('/',[LandingPageController::class,'hero']);
Route::get('/about',[LandingPageController::class,'about']);
Route::get('/contact',[LandingPageController::class,'contact']);
Route::get('/team',[LandingPageController::class,'team']);
Route::get('/teacher',[LandingPageController::class,'teacher']);
Route::get('/class',[LandingPageController::class,'kelas']);
Route::get('/schedule',[LandingPageController::class,'jadwal']);
Route::get('/show_class/{id}',[LandingPageController::class,'show_class']);
// Route::get('/', function () {
//     return view('users.layout.hero');

// Route::get('/detail', function () {
//     return view('admin.pengajar.detail');
// });

Route::get('/users', function () {
    return "Hai Sist";
});
Route::get('/login', function () {
    return view('admin.login');
});






Route::get('/regist_success', function () {
    return view('auth.success');
});
// Route::resource('kategori',kategoriController::class);
Route::middleware(['peran:admin'])->group(function() {
Route::resource('user',UserController::class)->middleware('auth');
Route::resource('materi',materiController::class)->middleware('auth');
Route::resource('peserta',pesertaController::class)->middleware('auth');
Route::resource('pengajar',pengajarController::class)->middleware('auth');
Route::resource('kelas', kelasController::class)->middleware('auth');
});
Route::middleware(['peran:admin-pengajar'])->group(function() {
Route::resource('/dashboard',DashboardController::class)->middleware('auth');
Route::resource('/jadwal',jadwalController::class)->middleware('auth');
Route::get('index_pengajar',[jadwalController::class,'index_pengajar'])->middleware('auth');
Route::get('jadwal-PDF',[jadwalController::class,'jadwalPDF'])->middleware('auth');
Route::get('jadwal_pengajar',[jadwalController::class,'jadwal_pengajar'])->middleware('auth');
Route::get('detail_surat_tugas/{id}',[jadwalController::class,'suratTugas'])->middleware('auth');
Route::get('surat_tugas',[jadwalController::class,'suratTugasAll'])->middleware('auth');
Route::get('/profile', function () {
    return view('admin.dashboard.profile');
})->middleware('auth');
});


Route::get('formemail', [KirimEmailController::class, 'index'])->middleware('auth');
Route::post('kirim', [KirimEmailController::class, 'kirim']) ->middleware('auth');


Route::get('/access-denied', function () {
    return view('access_denied');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
