<?php

namespace Database\Seeders;

use App\Models\BookHasGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookHasGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookHasGenre::create([
            'book_id' => '1',
            'category_id' => '1'
        ]);

        BookHasGenre::create([
            'book_id' => '1',
            'category_id' => '2'
        ]);

        BookHasGenre::create([
            'book_id' => '2',
            'category_id' => '1'
        ]);

        BookHasGenre::create([
            'book_id' => '2',
            'category_id' => '2'
        ]);

        BookHasGenre::create([
            'book_id' => '2',
            'category_id' => '3'
        ]);
    }
}
