<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'book_code',
        'title',
        'author',
        'editor',
        'translator',
        'language',
        'publisher',
        'publication_year',
        'page',
        'volume',
        'synopsis',
        'cover',
        'type',
        'book_status',
        'updated_at',
        'created_at'
    ];

    public function Lend()
    {
        return $this->hasMany(Lend::class);
    }

    public function Fine()
    {
        return $this->hasMany(Fine::class);
    }

    public function Favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    // public function Category()
    // {
    //     return $this->belongsToMany(Category::class);
    // }
}
