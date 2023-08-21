<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'role',
        'profile_picture',
        'created_at',
        'updated_at'
    ];

    public function Lend()
    {
        return $this->hasMany(Lend::class);
    }

    public function Favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
