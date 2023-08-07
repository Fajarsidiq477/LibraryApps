<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Pinjam;
use App\Models\Simpan;

class Controller extends BaseController
{
    public function getBuku(){
        $buku = Buku::All();

        return $buku;
    }

    public function getBukuJson(){

        $buku = app(Controller::class)->getBuku();

        try{
            return response()->json(
                [
                    'error'=>'false',
                    'data'=>$buku
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

    private function formatPinjam($pinjam){

    }

    public function getPinjam(){
        $pinjam = Pinjam::All();

        return $pinjam;
    }

    public function getPinjamJson(){

        $pinjam = app(Controller::class)->getPinjam();

        try{
            return response()->json(
                [
                    'error'=>'false',
                    'data'=>$pinjam
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

    public function getDataPinjam(){

        $pinjam = Pinjam::All();

        for($i = 0; $i < $pinjam->count(); $i++){

            $user = Pinjam::find($pinjam[$i]->id_pinjam)->user;
            $buku = Pinjam::find($pinjam[$i]->id_pinjam)->buku;

            if($pinjam[$i]->status_pinjam == 0){
                $pinjam[$i]->status_pinjam = app(Controller::class)->cekTelat($pinjam[$i]->tgl_kembali);
            }

            $pinjam[$i]->tgl_pinjam     = app(Controller::class)->getTanggal($pinjam[$i]->tgl_pinjam);
            $pinjam[$i]->tgl_kembali    = app(Controller::class)->getTanggal($pinjam[$i]->tgl_kembali);
            $pinjam[$i]->peminjam       = $user->name;
            $pinjam[$i]->judul_buku     = $buku->judul_buku;
            $pinjam[$i]->penulis        = $buku->penulis;
            $pinjam[$i]->thn_terbit     = $buku->thn_terbit;
            $pinjam[$i]->kode_buku      = $buku->kode_buku;
            $pinjam[$i]->cover_depan    = $buku->cover_depan;

        }

        return $pinjam;
    }

    private function cekTelat($date){

        // Mengubah tanggal dari string menjadi objek Carbon
        $customDate = Carbon::createFromFormat('Y-m-d', $date);

        // Mengambil tanggal hari ini dalam objek Carbon
        $today = Carbon::now();

        // Membandingkan tanggal hari ini dengan tanggal dari $date
        if ($today->gt($customDate)) {
            $status_pinjam = 3; // 3 = Telat. tidak ada di database, hanya ada di data yang akan dikirim ke view untuk digunakan saat switch case
            return $status_pinjam;
        } else {
            $status_pinjam = 0;
            return $status_pinjam;
        }
    }

    private function getTanggal($date){

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
        $hari = $daysInIndonesian[$customDate->format('l')];
        $bulan = $monthsInIndonesian[$customDate->format('F')];

        // Format tanggal menjadi "day, date month year"
        $tgl = $hari.', '.$customDate->format('d').' '.$bulan.' '.$customDate->format('Y');

        return $tgl;

    }

    public function getSimpan(){
        $simpan = Simpan::All();

        return $simpan;
    }

    public function getDataSimpan(){

        $simpan = app(Controller::class)->getSimpan();

        for($i = 0; $i < $simpan->count(); $i++){

            $user = Simpan::find($simpan[$i]->id_simpan)->user;
            $buku = Simpan::find($simpan[$i]->id_simpan)->buku;

            $simpan[$i]->judul_buku     = $buku->judul_buku;
            $simpan[$i]->penulis        = $buku->penulis;
            $simpan[$i]->thn_terbit     = $buku->thn_terbit;
            $simpan[$i]->kode_buku      = $buku->kode_buku;
            $simpan[$i]->cover_depan    = $buku->cover_depan;

        }

        return $simpan;

    }


    public function coba(){

        $simpan = "Hanya Mencoba";

        return $simpan;
    
    }

}
