<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nim',
        'nama_user',
        'email',
        'password',
        'angkatan',
        'role_user',
        'created_at',
        'updated_at'
    ];

    public function Pinjam()
    {
        return $this->hasMany(Pinjam::class, 'id_user');
    }

    public function Simpan()
    {
        return $this->hasMany(Simpan::class, 'id_user');
    }
}
