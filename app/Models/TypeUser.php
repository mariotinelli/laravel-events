<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $primaryKey = 'id_user_type';

    public function users()
    {
        return $this->hasMany(User::class, 'id_type_user', 'id_type_user');
    }
}
