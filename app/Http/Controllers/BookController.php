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
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $book = app(Controller::class)->getBook();

        $books = Book::all();
        
        return view('admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // note 
        // 1. Book code must generated automatically based on something. Something still unknown
        // 2. Add a synopsis, but is not required

        $validate = $request->validate([
            'book_code' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
            'type' => 'required',
            'book_status' => 'required'
        ], [
            'required' => ':attribute dibutuhkan',
        ]);


        
        $book = new Book();
        
        if ($request->hasFile('cover')) {
            $extension = $request->cover->extension();

            $filename = str_replace(' ', '_', $request->title) . '_' . uniqid() .'.' .  $extension;

            $path = $request->cover->storeAs('book_covers', $filename);

            $book->cover = $filename;
        }

        $book->book_code = $request->book_code;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication_year = $request->publication_year;
        $book->type = $request->type;
        $book->book_status = $request->book_status;
        $book->editor = $request->editor;
        $book->translator = $request->translator;
        $book->language = $request->language;
        $book->publisher = $request->publisher;
        $book->page = $request->page;
        $book->volume = $request->volume;
        $book->synopsis = $request->synopsis;

        $book->save();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil ditambahkan!']);

        // return dd($request);
        // $file = $request->file('cover');

        // if($file == null){
            // Alert::error('Error!', 'Gambar Tidak Boleh Kosong!');
            // return redirect()->action([BookController::class, 'create']);
            // return redirect()->back()->with('error', 'Gamber Tidak Boleh Kosong!');
        // }else{
            // $cover = $file->getClientOriginalName();
            
            // $directory = 'cover_images';
            // $file->move($directory, $cover);
        // }

        // if (Book::where('book_code', $request->book_code)->exists()) {

        //     Alert::error('Yah Error', 'Buku Dengan Kode Tersebut Telah Ada!');
        //     return redirect()->action([BookController::class, 'create']);
            
        // } else{
        //     $query = Book::create([
        //         'book_code'         => $request->book_code,
        //         'title'             => $request->title,
        //         'author'            => $request->author,
        //         'editor'            => $request->editor,
        //         'translator'        => $request->translator,
        //         'language'          => $request->language,
        //         'publisher'         => $request->publisher,
        //         'publication_year'  => $request->publication_year,
        //         'page'              => $request->page,
        //         'volume'            => $request->volume,
        //         // 'synopsis'          => $request->synopsis,
        //         'cover'             => $cover,
        //         'type'              => $request->type,
        //         'book_status'       => $request->book_status,
        //     ]);
            
        //     Alert::success('Alhamdulillah', 'Buku Telah Ditambahkan :D');
        //     return redirect()->action([BookController::class, 'index']);
        // }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $book = Book::find($id);

        return view('admin.books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $book = Book::find($id);

        $validate = $request->validate([
            'book_code' => ['required', Rule::unique('book')->ignore($request->book_code)],
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
            'type' => 'required',
            'book_status' => 'required'
        ], [
            'required' => ':attribute dibutuhkan',
        ]);

        $book->book_code = $request->book_code;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication_year = $request->publication_year;
        $book->type = $request->type;
        $book->book_status = $request->book_status;
        $book->editor = $request->editor;
        $book->translator = $request->translator;
        $book->language = $request->language;
        $book->publisher = $request->publisher;
        $book->page = $request->page;
        $book->volume = $request->volume;
        $book->synopsis = $request->synopsis;

        if ($request->hasFile('cover')) {
 
            $extension = $request->cover->extension();
        
            $filename = str_replace(' ', '_', $request->title) . '_' . uniqid() .'.' .  $extension;

            // delete old cover
            if($book->cover !== 'default_cover.jpg') {
                Storage::delete('book_covers/'.$book->cover);
            }

            $path = Storage::putFileAs(
                'book_covers/', $request->file('cover'), $filename
            );

            $book->cover = $filename;
        }

        $book->update();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil diedit!']);


        // try{
        //     if($request->file('cover1') == null){
        //         $cover = $request->cover2;
        //     }else{
        //         $cover = $request->file('cover1')->getClientOriginalName();
                    
        //         $directory = 'cover_images';
        //         $request->file('cover1')->move($directory, $cover);
        //     }

        //     // Menghapus cover buku lama jika file gambar yang dimasukan memiliki nama file yang sama
        //     if(Book::where('id', $id)->exists()){   
        //         $a = Book::select('cover')->where('id', $id)->get();
        //         if($a[0]->cover != $cover){
        //             File::delete('cover_images/'.$a[0]->cover);
        //         }
        //     }

        //     $query = Book::where('id', $id)->update([
        //         'book_code'         => $request->book_code,
        //         'title'             => $request->title,
        //         'author'            => $request->author,
        //         'editor'            => $request->editor,
        //         'translator'        => $request->translator,
        //         'language'          => $request->language,
        //         'publisher'         => $request->publisher,
        //         'publication_year'  => $request->publication_year,
        //         'page'              => $request->page,
        //         'volume'            => $request->volume,
        //         // 'synopsis'          => $synopsis,
        //         'cover'             => $cover,
        //         'type'              => $request->type,
        //         'book_status'       => $request->book_status,
        //     ]);

        //     Alert::success('Alhamdulillah', 'Buku Telah Diupdate :D');
        //     return redirect()->action([BookController::class, 'index']);

        // }catch(\Exception $e){
        //     // untuk mencari error ketika debugging
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     public function addBook(Request $request){
        
        Book::find($id)->delete();

        return response()->json(
            [
                'error'=>false,
                'message'=>'Data Telah Dihapus'
            ]
        );

    }

    //  public function addBook(Request $request){
        
    //     $book_code          = $request->book_code;
    //     $title              = $request->title;
    //     $author             = $request->author;
    //     $editor             = $request->editor;
    //     $translator         = $request->translator;
    //     $language           = $request->language;
    //     $publisher          = $request->publisher;
    //     $publication_year   = $request->publication_year;
    //     $page               = $request->page;
    //     $volume             = $request->volume;
    //     $synopsis           = $request->synopsis;
    //     $cover              = $request->file('cover');
    //     $type               = $request->type;
    //     $book_status        = $request->book_status;

    //     try{

    //         if (Book::where('book_code', $book_code)->exists()) {
    //             return response()->json(
    //                 [
    //                     'error'=>true,
    //                     'message'=>'buku sudah ada'
    //                 ]
    //             );
    //         } else{
    //             $query = Book::create([
    //                 'book_code'         => $book_code,
    //                 'title'             => $title,
    //                 'author'            => $author,
    //                 'editor'            => $editor,
    //                 'translator'        => $translator,
    //                 'language'          => $language,
    //                 'publisher'         => $publisher,
    //                 'publication_year'  => $publication_year,
    //                 'page'              => $page,
    //                 'volume'            => $volume,
    //                 'synopsis'          => $synopsis,
    //                 'cover'             => $cover->getClientOriginalName(),
    //                 'type'              => $type,
    //                 'book_status'       => $book_status,
    //             ]);

    //             $directory = 'cover_images';
    
    //             $cover->move($directory, $cover->getClientOriginalName());

    //             return response()->json(
    //                 [
    //                     'error'=>false,
    //                     'message'=>'Data Telah Ditambahkan'
    //                 ]
    //             );

    //         }
    //     }
    //     catch(\Exception $e){
    //         return response()->json(
    //             [
    //                 'error'=>true,
    //                 'message'=>$e->getMessage()
    //             ]
    //         );
    //     }
    // }

    // public function updateCreateBook(Request $request){

    //     $mode               = $request->mode;
    //     $book_code          = $request->book_code;
    //     $title              = $request->title;
    //     $author             = $request->author;
    //     $editor             = $request->editor;
    //     $translator         = $request->translator;
    //     $language           = $request->language;
    //     $publisher          = $request->publisher;
    //     $publication_year   = $request->publication_year;
    //     $page               = $request->page;
    //     $volume             = $request->volume;
    //     // $sinopsis         = $request->sinopsis;
    //     $cover1             = $request->file('cover1');
    //     $type               = $request->type;
    //     $book_status        = $request->book_status;


        
    //     try{
    //         if($mode == "add"){
    //             if(Book::where('book_code', $book_code)->exists()){
    //                 return response()->json(
    //                     [
    //                         'error'=>true,
    //                         'message'=>"Buku dengan kode tersebut telah ada!"
    //                     ]
    //                 );
    //             }
    //         }

    //         if($cover1 == null){
    //             $cover = $request->cover2;
    //         }else{
    //             $cover = $cover1->getClientOriginalName();
                
    //             $directory = 'cover_images';
    //             $cover1->move($directory, $cover);
    //         }

    //         // Menghapus cover buku lama jika file gambar yang dimasukan memiliki nama file yang sama
    //         if(Book::where('book_code', $book_code)->exists()){   
    //             $a = Book::select('cover')->where('book_code', $book_code)->get();
    //             if($a[0]->cover != $cover){
    //                 File::delete('cover_images/'.$a[0]->cover);
    //             }
    //         }

    //         $book = Book::updateOrCreate(
    //             ['book_code' => $book_code],
    //             [
    //                 'title'             => $title,
    //                 'author'            => $author,
    //                 'editor'            => $editor,
    //                 'translator'        => $translator,
    //                 'language'          => $language,
    //                 'publisher'         => $publisher,
    //                 'publication_year'  => $publication_year,
    //                 'page'              => $page,
    //                 'volume'            => $volume,
    //                 // 'sinopsis'          => $sinopsis,
    //                 'cover'             => $cover,
    //                 'type'              => $type,
    //                 'book_status'       => $book_status,
    //             ]
    //         );

    //         return response()->json(
    //             [
    //                 'error'=>false,
    //                 'message'=>'Data Telah Dimasukan ke Database'
    //             ]
    //         );
    //     }
    //     catch(\Exception $e){
    //         return response()->json(
    //             [
    //                 'error'=>true,
    //                 'message'=>'Data Telah Dimasukan ke Database',
    //                 'err_message'=>$e->getMessage()
    //             ]
    //         );
    //     }
    // }

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



