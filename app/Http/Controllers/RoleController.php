<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class RoleController extends Controller
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
        
        $roles = Role::latest()->paginate(10);


       // return view('admin.index', ['users' => $users]);

    }
}

