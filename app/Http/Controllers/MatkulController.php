<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Kurikulum;
use Illuminate\Http\Request;


class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prodi.matkul', [
            'matkuls' => Matakuliah::all(),
        ]);
    }


    public function create()

    {
        $kurikulum = Kurikulum::all();
        return view('prodi.creatematkul')->with('kurikulums', $kurikulum);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:16|unique:mata_kuliah',
            'kode_matkul' => 'required|max:100',
            'nama_matkul' => 'required|max:100',
            'sks' => 'required|max:100',
            'kurikulum_id' => 'required|string|max:16|unique:kurikulum',
        ]);

        Matakuliah::create([
            'id' => $request->id,
            'nama_matkul' => $request->nama_matkul, // Pastikan nilai ini diambil dari form
            'kode_matkul' => $request->kode_matkul,
            'kurikulum_id' => $request->kurikulum_id,
            'sks' => $request->sks,
        ]);

        session()->flash('success', 'Data Produk Berhasil Ditambahkan');

        return redirect(route('produk.index'));
    }
}
//    public function store(Request $request)
//    {
//        $validatedData = $request->validate([
//            'id' => 'required|string|max:16|unique:mata_kuliah',
//            'kurikulum_id' => 'required|string|max:16|unique:kurikulum',
//            'kode_matkul' => 'required|max:100',
//            'nama_matkul' => 'required|max:100',
//            'sks' => 'required|max:100',
////            'tahun_akademik' => 'required|max:100',
////            'semester' => 'required|max:100',
//        ]);
//
//        $matkul = new Matakuliah();
//         $matkul->id = $validatedData['id'];
//        $matkul->kode_matkul = $validatedData['kode_matkul'];
//        $matkul->nama_matkul = $validatedData['nama_matkul'];
//        $matkul->sks = $validatedData['sks'];
//
//        // Inisialisasi objek Kurikulum dan atur propertinya
//        $kurikulum = new Kurikulum();
//        $kurikulum ->kurikulum_id = $validatedData['kurikulum_id'];
////        $kurikulum->tahun_akademik = $validatedData['tahun_akademik'];
////        $kurikulum->semester = $validatedData['semester'];
////        $kurikulum->save();
//
//        // Hubungkan objek Kurikulum dengan Matakuliah
////        $matkul->kurikulum_id = $kurikulum->id;
//
//        $matkul->save();
//
//        return redirect()->route('matkul-list');
//    }
//}
