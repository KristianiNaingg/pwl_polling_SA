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
    return redirect(route('login'));
});

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', function () {
        if (auth()->user()->role->role_name == 'admin') {
            return redirect()->route('user-list');
        } elseif (auth()->user()->role->role_name == 'mahasiswa') {
            return redirect()->route('mk-list');
        } elseif (auth()->user()->role->role_name == 'prodi') {
            return redirect()->route('prodi-list');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');
    
Route::get('/admin', [AdminController::class, 'index'])->name('user-list');
Route::get('/admin/user-create', [AdminController::class, 'create'])->name('user-create');
Route::post('/admin/user-store', [AdminController::class, 'store'])->name('user-store');
    
Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware(['mahasiswa'])->name('mahasiswa.dashboard');

Route::get('/prodi/dashboard', function () {
    return view('prodi.dashboard');
})->middleware(['prodi'])->name('prodi.dashboard');

    
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi-list');
Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi-create');
Route::post('/prodi-create', [ProdiController::class, 'store'])->name('prodi-store');

Route::get('/prodi-edit/{prodi}', [ProdiController::class, 'edit'])->name('prodi-edit');
Route::post('/prodi-edit/{prodi}', [ProdiController::class, 'update'])->name('prodi-update');
Route::get('/prodi-delete/{prodi}', [ProdiController::class, 'destroy'])->name('prodi-delete');

Route::get('/prodi/matkul', [MatkulController::class, 'index'])->name('matkul-list');
Route::get('/prodi/matkul-create', [MatkulController::class, 'create'])->name('matkul-create');
Route::post('/prodi/matkul-store', [MatkulController::class, 'store'])->name('matkul-store');

Route::get('/mk', [\App\Http\Controllers\MataKuliahController::class,'index'])->name('mk-list');
Route::get('/mk-polling', [\App\Http\Controllers\MataKuliahController::class,'polling'])->name('mk-polling');
Route::post('/mk-store', [\App\Http\Controllers\MataKuliahController::class,'store'])->name('mk-store');
});
    
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
require __DIR__.'/auth.php';
