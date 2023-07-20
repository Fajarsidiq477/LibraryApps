<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'username',
        'email',
        'password',
        'number',
        'role',
        'profile_picture',
        'created_at',
        'updated_at'
    ];

    public function Pinjam()
    {
        return $this->hasMany(Pinjam::class, 'nim');
    }

    public function Simpan()
    {
        return $this->hasMany(Simpan::class, 'nim');
    }
}
