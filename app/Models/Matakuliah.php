<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';
    protected $fillable =[
        'id',
        'kode_matkul',
        'nama_matku',
        'sks',

    ];


    public function kurikulum(){
        return $this->belongsTo (Kurikulum::class,'kurikulum_id');
    }
}
