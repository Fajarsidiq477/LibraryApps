<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;

class Controller extends BaseController
{
    public function getBuku(){

        $buku = Buku::All();

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
}
