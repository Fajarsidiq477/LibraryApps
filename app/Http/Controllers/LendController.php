<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lend;

class LendController extends Controller
{
    public function inputLendData(Request $request){
        
        $id             = $request->id;
        $user_id        = $request->user_id;
        // $kode_buku      = $request->kode_buku;
        $book_id        = $request->book_id;
        $lend_date      = $request->lend_date;
        $return_date    = $request->return_date;

        try {

            $query = Lend::create([
                'id'            => $id,
                'user_id'       => $user_id,
                'book_id'       => $book_id,
                'lend_date'     => $lend_date,
                'return_date'   => $return_date,
                'status_pinjam' => '0',
            ]);

            return response()->json(
                [
                    'error'       => false,
                    'message'     => "sukses"
                ]
            );
        
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'       => true,
                    'message'     => "gagal",
                    'err_message' => $e->getMessage()
                ]
            );
        }
    
    }
}
