<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'role';

    protected $fillable = [
      'role_id',
      'role_name',
    ];

    protected $primaryKey = 'role_id';


    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
