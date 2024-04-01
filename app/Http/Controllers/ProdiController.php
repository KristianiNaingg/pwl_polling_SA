<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prodi.index', [
            'prodis' => Prodi::all(),
        ]);
    }

    public function create()
        #menampilkan formnya saja
    {
        return view('prodi.create');
        #kk.created harus sesuai dengan nama file di directory kk
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'id' => 'required|string|max:16|unique:polling',
            'polling' => 'required|max:100',
            'tanggalbuka' => 'required|date',
            'tanggaltutup' => 'required|date',
        ]);

        // Simpan data Prodi ke dalam database
        $prodi = new Prodi();
        $prodi->id = $validatedData['id'];
        $prodi->nama_polling = $validatedData['polling']; // Pastikan 'nama_polling' diisi dengan nilai yang valid
        $prodi->tgl_buka = $validatedData['tanggalbuka'];
        $prodi->tgl_tutup = $validatedData['tanggaltutup'];
        $prodi->save();

        // Redirect ke halaman lain atau kembali ke halaman sebelumnya
        return redirect(route('prodi-list'));    }
}
