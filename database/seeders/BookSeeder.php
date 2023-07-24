<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku as Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'kode_buku' => 'FKWI123',
            'judul_buku' => 'Negeri Para Bedebah',
            'kategori' => 'novel',
            'penulis' => 'Tere Liye',
            'bahasa' => 'Indonesia',
            'penerbit' => 'Gramedia Pustaka Utama',
            'thn_terbit'=> 2012,
            'jml_hlm' => 440,
            'sinopsis' => 'Di negeri para bedebah, kisah fiksi kalah seru dibanding kisah nyata. Di negeri para bedebah, musang berbulu domba berkeliaran di halaman rumah. Tetapi setidaknya, Kawan, di negeri para bedebah, petarung sejati tidak akan pernah berkhianat.',
            'cover_depan' => 'negeriparabedebah.jpg',
            'jenis' => 'R',
            'status_buku' => 'Tersedia'
        ]);

        Book::create([
            'kode_buku' => 'SKD321',
            'judul_buku' => 'Negeri Di Ujung Tanduk',
            'kategori' => 'novel',
            'penulis' => 'Tere Liye',
            'bahasa' => 'Indonesia',
            'penerbit' => 'Gramedia Pustaka Utama',
            'thn_terbit'=> 2013,
            'jml_hlm' => 360,
            'sinopsis' => 'Di Negeri di Ujung Tanduk kehidupan semakin rusak, bukan karena orang jahat semakin banyak, tapi semakin banyak orang yang memilih tidak peduli lagi. Di Negeri di Ujung Tanduk, para penipu menjadi pemimpin, para pengkhianat menjadi pujaan, bukan karena tidak ada lagi yang memiliki teladan, tapi mereka memutuskan menutup mata dan memilih hidup bahagia sendirian. Tapi di Negeri di Ujung Tanduk setidaknya, kawan, seorang petarung sejati akan memilih jalan suci, meski habis seluruh darah di badan, menguap segenap air mata, dia akan berdiri paling akhir, demi membela kehormatan.',
            'cover_depan' => 'negeridiujungtanduk.jpg',
            'jenis' => 'R',
            'status_buku' => 'Tersedia'
        ]);
    }
}
