<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'book_id',
        'updated_at',
        'created_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function Book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
