<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book as Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'book_code' => 'FKWI123',
            'title' => 'Negeri Para Bedebah',
            'author' => 'Tere Liye',
            'language' => 'Indonesia',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year'=> 2012,
            'page' => 440,
            'synopsis' => 'Di negeri para bedebah, kisah fiksi kalah seru dibanding kisah nyata. Di negeri para bedebah, musang berbulu domba berkeliaran di halaman rumah. Tetapi setidaknya, Kawan, di negeri para bedebah, petarung sejati tidak akan pernah berkhianat.',
            'cover' => 'negeriparabedebah.jpg',
            'type' => '0',
            'book_status' => '0'
        ]);

        Book::create([
            'book_code' => 'SKD321',
            'title' => 'Negeri Di Ujung Tanduk',
            'author' => 'Tere Liye',
            'language' => 'Indonesia',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year'=> 2013,
            'page' => 360,
            'synopsis' => 'Di Negeri di Ujung Tanduk kehidupan semakin rusak, bukan karena orang jahat semakin banyak, tapi semakin banyak orang yang memilih tidak peduli lagi. Di Negeri di Ujung Tanduk, para penipu menjadi pemimpin, para pengkhianat menjadi pujaan, bukan karena tidak ada lagi yang memiliki teladan, tapi mereka memutuskan menutup mata dan memilih hidup bahagia sendirian. Tapi di Negeri di Ujung Tanduk setidaknya, kawan, seorang petarung sejati akan memilih jalan suci, meski habis seluruh darah di badan, menguap segenap air mata, dia akan berdiri paling akhir, demi membela kehormatan.',
            'cover' => 'negeridiujungtanduk.jpg',
            'type' => '0',
            'book_status' => '0'
        ]);
    }
}
