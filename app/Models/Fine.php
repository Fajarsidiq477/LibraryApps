<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table = 'fine';
    protected $primaryKey = 'id';
    protected $fillable = [
        'lend_id',
        'fine_amount',
        'paid_amount',
        'fine_status',
        'updated_at',
        'created_at'
    ];

    public function Lend()
    {
        return $this->belongsTo(Lend::class, 'lend_id');
    }
}
