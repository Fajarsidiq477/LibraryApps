<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'tbl_pinjam';
    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
        'id_pinjam',
        'nim',
        'kode_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'status_pinjam',
        'updated_at',
        'created_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'nim');
    }

    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'kode_buku');
    }

    public function Denda()
    {
        return $this->hasMany(Denda::class, 'id_pinjam');
    }

}
