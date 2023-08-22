<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Favorite;

class BookController extends Controller
{
    public function addBook(Request $request){
        
        $book_code          = $request->book_code;
        $title              = $request->title;
        $author             = $request->author;
        $editor             = $request->editor;
        $translator         = $request->translator;
        $language           = $request->language;
        $publisher          = $request->publisher;
        $publication_year   = $request->publication_year;
        $page               = $request->page;
        $volume             = $request->volume;
        $synopsis           = $request->synopsis;
        $cover              = $request->file('cover');
        $type               = $request->type;
        $book_status        = $request->book_status;

        try{

            if (Book::where('book_code', $book_code)->exists()) {
                return response()->json(
                    [
                        'error'=>true,
                        'message'=>'buku sudah ada'
                    ]
                );
            } else{
                $query = Book::create([
                    'book_code'         => $book_code,
                    'title'             => $title,
                    'author'            => $author,
                    'editor'            => $editor,
                    'translator'        => $translator,
                    'language'          => $language,
                    'publisher'         => $publisher,
                    'publication_year'  => $publication_year,
                    'page'              => $page,
                    'volume'            => $volume,
                    'synopsis'          => $synopsis,
                    'cover'             => $cover->getClientOriginalName(),
                    'type'              => $type,
                    'book_status'       => $book_status,
                ]);

                $directory = 'cover_images';
    
                $cover->move($directory, $cover->getClientOriginalName());

                return response()->json(
                    [
                        'error'=>false,
                        'message'=>'Data Telah Ditambahkan'
                    ]
                );

            }
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>true,
                    'message'=>$e->getMessage()
                ]
            );
        }
    }

    public function updateCreateBook(Request $request){

        $mode               = $request->mode;
        $book_code          = $request->book_code;
        $title              = $request->title;
        $author             = $request->author;
        $editor             = $request->editor;
        $translator         = $request->translator;
        $language           = $request->language;
        $publisher          = $request->publisher;
        $publication_year   = $request->publication_year;
        $page               = $request->page;
        $volume             = $request->volume;
        // $sinopsis         = $request->sinopsis;
        $cover1             = $request->file('cover1');
        $type               = $request->type;
        $book_status        = $request->book_status;


        
        try{
            if($mode == "add"){
                if(Book::where('book_code', $book_code)->exists()){
                    return response()->json(
                        [
                            'error'=>true,
                            'message'=>"Buku dengan kode tersebut telah ada!"
                        ]
                    );
                }
            }

            if($cover1 == null){
                $cover = $request->cover2;
            }else{
                $cover = $cover1->getClientOriginalName();
                
                $directory = 'cover_images';
                $cover1->move($directory, $cover);
            }

            // Menghapus cover buku lama jika file gambar yang dimasukan memiliki nama file yang sama
            if(Book::where('book_code', $book_code)->exists()){   
                $a = Book::select('cover')->where('book_code', $book_code)->get();
                if($a[0]->cover != $cover){
                    File::delete('cover_images/'.$a[0]->cover);
                }
            }

            $book = Book::updateOrCreate(
                ['book_code' => $book_code],
                [
                    'title'             => $title,
                    'author'            => $author,
                    'editor'            => $editor,
                    'translator'        => $translator,
                    'language'          => $language,
                    'publisher'         => $publisher,
                    'publication_year'  => $publication_year,
                    'page'              => $page,
                    'volume'            => $volume,
                    // 'sinopsis'          => $sinopsis,
                    'cover'             => $cover,
                    'type'              => $type,
                    'book_status'       => $book_status,
                ]
            );

            return response()->json(
                [
                    'error'=>false,
                    'message'=>'Data Telah Dimasukan ke Database'
                ]
            );
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>true,
                    'message'=>'Data Telah Dimasukan ke Database',
                    'err_message'=>$e->getMessage()
                ]
            );
        }
    }

    public function bookSave(Request $request){
        
        $user_id    = $request->user_id;
        $book_id    = $request->book_id;
        
        try{

            if(Favorite::where('user_id', $user_id)->where('book_id', $book_id)->exists()){
                return response()->json(
                    [
                        'error'=>false,
                        'message'=>'Buku ini telah anda tambahkan ke favorit :)'
                    ]
                );
            }else{

                $query = Favorite::create([
                    'user_id' => $user_id,
                    'book_id' => $book_id,
                ]);

                return response()->json(
                    [
                        'error'=>false,
                        'message'=>'Buku telah ditambahkan ke favorit :D'
                    ]
                );

            }

        }catch(\Exception $e){
            return response()->json(
                [
                    'error'=>true,
                    'message'=>'Gagal',
                    'err_message'=>$e->getMessage(),
                ]
            );
        }
    }
}