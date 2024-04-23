<?php

namespace App\Http\Controllers;
use App\Models\Matakuliah;
use App\Models\Kurikulum;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{


    public function index()
    {
        $matkuls = Matakuliah::with('kurikulum')->get();
        $pollings = Prodi::all(); // Definisikan variabel $pollings
        return view('prodi.index', compact('matkuls', 'pollings')); // Mengirimkan data $matkuls dan $pollings ke view
    }



    public function create()

    {
        $lastId = Matakuliah::max('id_matkul');
        // Menambah 1 untuk mendapatkan id berikutnya
        $nextId = $lastId + 1;
        $kurikulums = Kurikulum::all();
        $matkuls = Matakuliah::all();
//        $pollings = Prodi::all();
        return view('prodi.creatematkul', compact('kurikulums','matkuls','nextId'));
    }

    public function polling()
    {
        return view('prodi.index',[
            'pollings'=>Prodi::all(),
        ]);
    }
    public function createpolling(){
        $pollings = Prodi::all();
        return view('prodi.index', compact('pollings'));
    }

//    public function getPollingDetails($id)
//    {
//        $polling = Prodi::findOrFail($id);
//        return response()->json($polling);
//    }
//


    public function storepolling(Request $request)

    {

//        return view('prodi.index',[
//            'prodis' => Prodi::all(),
//        ]);
        $validatedData = $request->validate([
            'id_polling' => 'required|integer|max:11',
            'nama_polling' => 'required|max:100',
            'tgl_buka' => 'required|date',
            'tgl_tutup ' => 'required|date',
        ]);
        // Simpan data Prodi ke dalam database
        $prodi = new Prodi();
        $prodi->id_polling = $validatedData['id_polling'];
        $prodi->nama_polling = $validatedData['nama_polling']; // Pastikan 'nama_polling' diisi dengan nilai yang valid
        $prodi->tgl_buka = $validatedData['tgl_buka'];
        $prodi->tgl_tutup = $validatedData['tgl_tutup'];
        $prodi->save();

        // Redirect ke halaman lain atau kembali ke halaman sebelumnya
        return redirect()->route('prodi-mklist')->with('success','sukses full');


    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_matkul' => 'required|string|max:16|unique:mata_kuliah',
            'kode_matkul' => 'required|max:100',
            'nama_matkul' => 'required|max:100',
            'sks' => 'required|max:100',
            'kurikulum_id' => 'required|string|max:16',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Matakuliah::create([
            'id_matkul' => $request->id_matkul,
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $request->kode_matkul,
            'kurikulum_id' => $request->kurikulum_id,
            'sks' => $request->sks,

        ]);

        session()->flash('success', 'Data Matakuliah Berhasil Ditambahkan');

        return redirect()->route('prodi-mklist');
    }
    public function edit(Matakuliah $matkul)
    {

        $kurikulums = Kurikulum::all();
        return view('prodi.editmatkul', compact('matkul',  'kurikulums'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Matakuliah $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matkul)
    {
        $validatedData = $request->validate([
            'id_matkul' => 'required|string|max:16|unique:mata_kuliah',
            'kode_matkul' => 'required|max:100',
            'nama_matkul' => 'required|max:100',
            'sks' => 'required|max:100',
            'kurikulum_id' => 'required|string|max:16',
        ]);

        $matkul->update([
            'id_matkul'=>  $validatedData->id_matkul,
            'nama_matkul' =>  $validatedData->nama_matkul,
            'kode_matkul' =>  $validatedData->kode_matkul,
            'kurikulum_id' =>  $validatedData->kurikulum_id,
            'sks' =>  $validatedData->sks,
        ]);

        return redirect(route('prodi-mklist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Matakuliah $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matkul)
    {
        $matkul->delete();
        return redirect(route('prodi-mklist'));
    }

    public function prodi()
    {
        return view('prodi.index',[
        'prodis' => Prodi::all(),
            ]);


    }


}
