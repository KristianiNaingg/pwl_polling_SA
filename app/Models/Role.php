<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "role";

    protected $fillable = [
        'role',
        'role_id'
    ];

    protected $primaryKey = 'role_id';

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
