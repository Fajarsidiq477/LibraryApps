<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;


class BookDataController extends Controller
{
    public function search(Request $request) {
        try{

            $data = Book::where('title', 'like', '%' . $request->keyword . '%')->get();

            if($data->count() == 0) {
                return response()->json(
                    [
                        'data' => null,
                        'error' => 'false',
                        'message' => 'Buku dengan keyword \'' . $request->keyword . '\' tidak ditemukan',
                    ]
                );
            }

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

    public function filter(Request $request) {
        try {
            $status = ['0', '1', '2']; 

            if($request->filterStatus == true) {
                $status = ['0']; // tersedia
            }

            $book = Book::whereIn('book_status', $status)->get();

            if($request->filterStatus == false && $request->filterCategory == '') {
                return response()->json([
                    'data' => $book,
                    'error' => 'false',
                    'message' => '',
                ]);
            }

            if(count($book) > 0) {
                return response()->json([
                    'data' => $book,
                    'error' => 'false',
                    'message' => count($book) . ' buku berhasil ditemukan',
                ]);
            }

            return response()->json([
                'error' => 'false',
                'message' => count($book) . ' buku berhasil ditemukan',
            ]);

            
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error'=>'true',
                    'message'=>$e->getMessage()
                ]
            );
        }
    }

    public function getBookByBookCode(Request $request) {



        $books = [];

        for ($i=1; $i <= count($request->input()); $i++) { 
            $identifier = 'bookCodeInput' . $i;
            $books[] = Book::where('book_code', $request->$identifier)->first(); 
        }

        return response()->json($books);




        
        
        if(!$request->bookCode) return abort(404);
        
        $book = Book::where('book_code', $request->bookCode)->get(); 

        
        
        if($book->count() > 0) {
            return response()->json([
                'error' => 'false',
                'data' => $book,
                'message' => ''
            ]);
        }

        return response()->json([
            'error' => 'true',
            'data' => '',
            'message' => 'Tidak ada data yang ditemukan'
        ]);
    }

    
}
