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
        $lastId = Prodi::max('id');
        // Menambah 1 untuk mendapatkan id berikutnya
        $nextId = $lastId + 1;
        return view('prodi.create',(compact('nextId')));

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
        return redirect(route('prodi-list'));
    }


    public function show(Prodi $prodi)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi $prodi
     * @return \Illuminate\Http\Response
     */

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', [
            'prodi' => $prodi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Prodi $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:16|unique:polling',
            'polling' => 'required|max:100',
            'tanggalbuka' => 'required|date',
            'tanggaltutup' => 'required|date',
         // Mengganti 'polling' menjadi 'nama_polling' sesuai dengan nama kolom dalam tabel
        ], [
            'id.required' => ' Id Wajib diisi',
            'polling.required' => 'Polling wajib diisi',
            'tanggalbuka.required' => 'Tanggal  Buka wajib diisi',
            'tanggaltutup.required' => 'Tanggal Tutup  wajib diisi',
        ]);

        $prodi->id = $validatedData['id'];
        $prodi->nama_polling = $validatedData['polling']; // Pastikan 'nama_polling' diisi dengan nilai yang valid
        $prodi->tgl_buka = $validatedData['tanggalbuka'];
        $prodi->tgl_tutup = $validatedData['tanggaltutup'];
        $prodi->save();

        return redirect(route('prodi-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Prodi $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect(route('prodi-list'));
    }
}
