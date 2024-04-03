<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatkulController extends Controller
{
    public function index()
    {
        $matkuls = Matakuliah::with('kurikulum')->get();
        return view('prodi.matkul', compact('matkuls'));
    }

    public function create()

    {
        $lastId = Matakuliah::max('id');
        // Menambah 1 untuk mendapatkan id berikutnya
        $nextId = $lastId + 1;
        $kurikulums = Kurikulum::all();
        $matkuls = Matakuliah::all();
        return view('prodi.creatematkul', compact('kurikulums','matkuls','nextId'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:16|unique:mata_kuliah',
            'kode_matkul' => 'required|max:100',
            'nama_matkul' => 'required|max:100',
            'sks' => 'required|max:100',
            'kurikulum_id' => 'required|string|max:16',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Matakuliah::create([
           'id' => $request->id,
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $request->kode_matkul,
            'kurikulum_id' => $request->kurikulum_id,
            'sks' => $request->sks,
        ]);

        session()->flash('success', 'Data Matakuliah Berhasil Ditambahkan');

        return redirect()->route('matkul-list');
    }
}
