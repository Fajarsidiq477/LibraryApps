<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'profile_picture',
        'created_at',
        'updated_at'
    ];

    public function lends(): HasMany
    {
        return $this->hasMany(Lend::class);
    }

    public function Fine(): HasMany
    {
        return $this->hasMany(Fine::class);
    }

    public function Favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
