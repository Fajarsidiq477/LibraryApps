<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;


class BookDataController extends Controller
{
    public function search(Request $request) {
        try{

            $data = Book::where('title', 'like', '%' . $request->keyword . '%')->get();

            if(strlen($request->keyword) == 0) {
                return response()->json(
                    [
                        'data' => $data,
                        'error' => 'false',
                        'message' => '',
                    ]
                );
            }
            
            if(strlen($request->keyword) > 0) {
                if($data->count() > 0) {
                    return response()->json(
                        [
                            'error'=>'false',
                            'data'=> $data,
                            'message' => $data->count() . ' data buku dengan keyword "' . $request->keyword . '" berhasil dicari!' 
                        ]
                    );
                }

                return response()->json(
                    [
                        'error'=>'false',
                        'data'=> $data,
                        'message' => 'Tidak menemukan data buku dengan keyword "' . $request->keyword . '"'
                    ]
                );
            }
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
