<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'tbl_buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'judul_buku_asli',
        'kategori',
        'penulis',
        'editor',
        'penerjemah',
        'bahasa',
        'penerbit',
        'thn_terbit',
        'jml_hlm',
        'volume',
        'sinopsis',
        'cover_depan',
        'cover_belakang',
        'kelayakan',
        'jenis',
        'status_buku',
        'updated_at',
        'created_at'
    ];

    public function Pinjam()
    {
        return $this->hasMany(Pinjam::class, 'kode_buku');
    }

    public function Simpan()
    {
        return $this->hasMany(Simpan::class, 'kode_buku');
    }
}
