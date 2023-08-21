<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'book_has_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'book_id',
        'category_id',
        'updated_at',
        'created_at'
    ];
}
