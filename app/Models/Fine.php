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
        'user_id',
        'book_id',
        'fine_amount',
        'fine_status',
        'updated_at',
        'created_at'
    ];

    public function Lend()
    {
        return $this->belongsTo(Lend::class, 'lend_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
