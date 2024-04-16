<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'id',
        'kode_matkul',
        'nama_matkul',
        'sks',
        'kurikulum_id',
    ];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class, 'kurikulum_id', 'kurikulum_id');

    }

    public function prodi()
    {
        return $this->belongsToMany(Prodi::class);
    }

}
