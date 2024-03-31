<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function() {
    return redirect(route('login'));
});

Route::get('/starter', function(){
    return view('starter' );
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\MataKuliahController::class, 'index'])->name('dashboard');
});

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');

require __DIR__.'/auth.php';

Route::get('/mk', [\App\Http\Controllers\MataKuliahController::class,'index'])->name('mk-list');
Route::get('/mk-polling', [\App\Http\Controllers\MataKuliahController::class,'polling'])->name('mk-polling');
Route::post('/mk-store', [\App\Http\Controllers\MataKuliahController::class,'store'])->name('mk-store');

