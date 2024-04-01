<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class AdminController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        // return view('admin.index',[
        //     'users'=>User::all(),

        // ]);

        // Mengambil semua pengguna beserta relasi peran
        
        
        $users = User::all();

        // Menghitung total jumlah peran yang unik dari semua pengguna
        $rolesCount = Role::count();
       
     
       
 // Menghitung total jumlah role mahasiswa 
        $roleMahasiswaCount= User::whereHas('role', function ($query) {
            $query->where('role_name', 'mahasiswa');
        })->count();


        return view('admin.index', ['users' => $users], compact( 'rolesCount','roleMahasiswaCount'));

    }

   
}
