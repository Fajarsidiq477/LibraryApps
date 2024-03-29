<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Lend;
use App\Models\Fine;
use App\Models\Favorite;
use Alert;

class Controller extends BaseController
{

    public function getBook(){
        $book = Book::All();

        return $book;
    }

    public function getBookJson(){

        $book = app(Controller::class)->getBook();

        try{
            return response()->json(
                [
                    'error'=>'false',
                    'data'=>$book
                ]
            );
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>'true',
                    'message'=>$e->getMessage()
                ]
            );
         }
    }

    public function getUser(){
        $user = User::All();

        return $user;
    }

    public function getUserJson(){

        $user = app(Controller::class)->getUser();

        try{
            return response()->json(
                [
                    'error'=>'false',
                    'data'=>$user
                ]
            );
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>'true',
                    'message'=>$e->getMessage()
                ]
            );
         }
    }

    private function LendFormat($pinjam){

    }

    public function getLend(){
        $lend = Lend::All();

        return $lend;
    }

    public function getLendJson(){

        $lend = app(Controller::class)->getLend();

        try{
            return response()->json(
                [
                    'error'=>'false',
                    'data'=>$lend
                ]
            );
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>'true',
                    'message'=>$e->getMessage()
                ]
            );
         }
    }

    public function getLendData(){

        $lend = Lend::All();

        for($i = 0; $i < $lend->count(); $i++){

            $user = Lend::find($lend[$i]->id)->user;
            $book = Lend::find($lend[$i]->id)->book;

            if($lend[$i]->lend_status == 0){
                $lend[$i]->lend_status = app(Controller::class)->lateCheck($lend[$i]->return_date);
            }

            $lend[$i]->lend_date        = app(Controller::class)->getDate($lend[$i]->lend_date);
            $lend[$i]->return_date      = app(Controller::class)->getDate($lend[$i]->return_date);
            $lend[$i]->name             = $user->name;
            $lend[$i]->title            = $book->title;
            $lend[$i]->penulis          = $book->author;
            $lend[$i]->publication_year = $book->publication_year;
            $lend[$i]->book_code        = $book->book_code;
            $lend[$i]->cover            = $book->cover;

        }

        return $lend;
    }

    private function getDate($date){

        $customDate = Carbon::createFromFormat('Y-m-d', $date);

        // Array untuk mapping nama hari dalam bahasa Inggris ke bahasa Indonesia
        $daysInIndonesian = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
        ];

        // Array untuk mapping nama bulan dalam bahasa Inggris ke bahasa Indonesia
        $monthsInIndonesian = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        ];

        // Ambil nama hari dan bulan dalam bahasa Indonesia menggunakan mapping di atas
        $day = $daysInIndonesian[$customDate->format('l')];
        $month = $monthsInIndonesian[$customDate->format('F')];

        // Format tanggal menjadi "day, date month year"
        $tgl = $day.', '.$customDate->format('d').' '.$month.' '.$customDate->format('Y');

        return $tgl;

    }

    public function getFineData(){
        
        $lend = Lend::where('lend_status', '=', '0')->get();

        for($i = 0 ; $i < $lend->count(); $i++){
            
            $lend[$i]->lend_status = app(Controller::class)->lateCheck($lend[$i]->return_date);

            if($lend[$i]->lend_status != 0){
                $fine_amount = app(Controller::class)->countFine($lend[$i]->return_date);
                $fine = Fine::updateOrCreate(
                    ['lend_id' => $lend[$i]->id],
                    [
                        'user_id'       => $lend[$i]->user_id,
                        'book_id'       => $lend[$i]->book_id,
                        'fine_amount'   => $fine_amount
                    ]
                );
            }

        }

        return Fine::All();
    }

    public function lateCheck($date){

        // Mengubah tanggal dari string menjadi objek Carbon
        $customDate = Carbon::createFromFormat('Y-m-d', $date);

        // Mengambil tanggal hari ini dalam objek Carbon
        $today = Carbon::now();

        // Membandingkan tanggal hari ini dengan tanggal dari $date
        if ($today->gt($customDate->addSecond(1))) {
            $lend_status = 3; // 3 = Telat. tidak ada di database, hanya ada di data yang akan dikirim ke view untuk digunakan saat switch case
            return $lend_status;
        } else {
            $lend_status = 0;
            return $lend_status;
        }
    }

    public function countFine($return_date){

        $return     = Carbon::parse($return_date);
        $today      = Carbon::today()->toDateString();

        // Jumlah hari telat
        $interval = $return->diffInDays($today);

        // Jumlah hari libur (tidak dihitung denda)
        $weekends = $return->diffInDaysFiltered(function (Carbon $date){
            return !$date->isWeekday();
        }, $today);

        // Total denda
        $fine_amount = ($interval - $weekends) * 500;

        return $fine_amount;

    }

    public function getFavorite(){
        $favorite = Favorite::All();

        return $favorite;
    }

    public function getFavoriteData(){

        $favorite = app(Controller::class)->getFavorite();

        for($i = 0; $i < $favorite->count(); $i++){

            $user = Favorite::find($favorite[$i]->id)->user;
            $book = Favorite::find($favorite[$i]->id)->book;

            $favorite[$i]->title            = $book->title;
            $favorite[$i]->author           = $book->author;
            $favorite[$i]->publication_year = $book->publication_year;
            $favorite[$i]->book_code        = $book->book_code;
            $favorite[$i]->cover            = $book->cover;

        }

        return $favorite;

    }


    public function coba(){

        $date = "2023-10-12";

        // Mengubah tanggal dari string menjadi objek Carbon
        $customDate = Carbon::createFromFormat('Y-m-d', $date);

        // Mengambil tanggal hari ini dalam objek Carbon
        $today = Carbon::now();

        // Membandingkan tanggal hari ini dengan tanggal dari $date
        // if ($today->gt($customDate)) {
        //     $lend_status = 3; // 3 = Telat. tidak ada di database, hanya ada di data yang akan dikirim ke view untuk digunakan saat switch case
        //     return $lend_status;
        // } else {
        //     $lend_status = 0;
        //     return $lend_status;
        // }

        // $return     = Carbon::parse("2023-10-12");
        // $today      = Carbon::today()->toDateString();

        // // Jumlah hari telat
        // $interval = $return->diffInDays($today);

        return $today->gt($customDate->addSecond(1));
    
    }

}
