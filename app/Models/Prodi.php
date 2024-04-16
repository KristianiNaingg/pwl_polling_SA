<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'polling';
    protected $fillable = [
        'id',
        'nama_polling',
        'tgl_buka',
        'tgl_tutup',
    ];


    protected $primaryKey = 'id';

    public function matkul()
    {
        return $this->belongsToMany(Matakuliah::class);
    }
}
