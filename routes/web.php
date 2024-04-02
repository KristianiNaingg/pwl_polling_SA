<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MatkulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/starter', function(){
    return view('starter' );
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

require __DIR__.'/auth.php';
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi-list');
Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi-create');
Route::post('/prodi-create', [ProdiController::class, 'store'])->name('prodi-store');


Route::get('/prodi/matkul', [MatkulController::class, 'index'])->name('matkul-list');

Route::get('/prodi/matkul-create', [MatkulController::class, 'create'])->name('matkul-create');
Route::post('/prodi/matkul-store', [MatkulController::class, 'store'])->name('matkul-store');

Route::get('/mk', [\App\Http\Controllers\MataKuliahController::class,'index'])->name('mk-list');
Route::get('/mk-polling', [\App\Http\Controllers\MataKuliahController::class,'polling'])->name('mk-polling');
Route::post('/mk-store', [\App\Http\Controllers\MataKuliahController::class,'store'])->name('mk-store');

