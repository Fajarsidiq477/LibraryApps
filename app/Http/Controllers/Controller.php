<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Pinjam;

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

            $date = $pinjam[$i]->tgl_pinjam;        
            $customDate = Carbon::createFromFormat('Y-m-d', $date);

            $hari       = trans('id.days.'.$customDate->format('l'));
            $tanggal    = $customDate->format('d');
            $bulan      = trans('id.months.'.$customDate->format('F'));
            $tahun      = $customDate->format('Y');
    
            $pinjam[$i]->tgl_pinjam     = $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
            $pinjam[$i]->peminjam       = $user->name;
            $pinjam[$i]->judul_buku     = $buku->judul_buku;
            $pinjam[$i]->kode_buku      = $buku->kode_buku;
            $pinjam[$i]->cover_depan    = $buku->cover_depan;
        }

        return $pinjam;
    }

}
