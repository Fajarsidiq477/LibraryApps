<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use App\Models\User;

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
}
