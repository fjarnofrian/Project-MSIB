<?php
use App\Http\Controllers\Api\KelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\penjadwalController;
use App\Http\Controllers\jadwalController;;
use App\Http\Controllers\Api\PengajarController;



/*	/*
|--------------------------------------------------------------------------	|--------------------------------------------------------------------------
| API Routes	| API Routes
|--------------------------------------------------------------------------	|--------------------------------------------------------------------------
|	|
| Here is where you can register API routes for your application. These	| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will	| routes are loaded by the RouteServiceProvider within a group which
| be assigned to the "api" middleware group. Make something great!	| is assigned the "api" middleware group. Enjoy building your API!
|	|
*/	

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//materi, kelas, user
Route::resource('materi',MateriController::class);	Route::resource('materi',MateriController::class);
Route::resource('kelas',KelasController::class);	Route::resource('kelas',KelasController::class);
Route::resource('user', UserController::class);	Route::resource('user', UserController::class);

//pengajar
Route::get('/pengajar', [PengajarController::class, 'index']);
Route::get('/pengajar/{id}', [PengajarController::class, 'show']);
Route::post('/pengajar-create', [PengajarController::class, 'store']);
Route::put('/pengajar/{id}', [PengajarController::class, 'update']);
Route::delete('/pengajar/{id}', [PengajarController::class, 'destroy']);

// jadwal
Route::get('/apijadwal',[jadwalController::class,'apiJadwal']);
Route::get('/apijadwal/{id}',[jadwalController::class,'apiJadwaldetail']);


Route::get('penjadwal', [penjadwalController::class,'index']);
Route::get('penjadwal/{id}', [penjadwalController::class,'show']);
Route::post('/penjadwal-create', [penjadwalController::class,'store']);
Route::put('/penjadwal/{id}', [penjadwalController::class,'update']);
Route::delete('/penjadwal/{id}', [penjadwalController::class,'destroy']);

//peserta
Route::get('peserta', 'App\Http\Controllers\Api\pesertaController@index');
Route::get('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@show');
Route::post('peserta-create', 'App\Http\Controllers\Api\pesertaController@store');
Route::put('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@update');
Route::delete('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@destroy');