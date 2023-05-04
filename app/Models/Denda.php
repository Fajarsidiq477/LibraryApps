<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'tbl_denda';
    protected $primaryKey = 'id_denda';
    protected $fillable = [
        'id_pinjam',
        'jml_denda',
        'jml_bayar',
        'status_denda',
        'updated_at',
        'created_at'
    ];

    public function Pinjam()
    {
        return $this->belongsTo(Pinjam::class, 'id_pinjam');
    }
}
