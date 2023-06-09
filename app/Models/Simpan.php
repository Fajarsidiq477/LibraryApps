<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpan extends Model
{
    protected $table = 'tbl_simpan';
    protected $primaryKey = 'id_simpan';
    protected $fillable = [
        'id_user',
        'id_buku',
        'updated_at',
        'created_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
