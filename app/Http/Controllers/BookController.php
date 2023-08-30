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
        }else{
            return redirect('/admin/books/create')->with('error', ['message' => 'Gambar tidak boleh kosong!']);
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
            // 'book_code' => ['required', Rule::unique('book')->ignore($request->book_code)],
            'book_code' => 'required',
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
            if($book->cover !== 'cover_default.jpg') {
                Storage::delete('book_covers/'.$book->cover);
            }

            $path = Storage::putFileAs(
                'book_covers/', $request->file('cover'), $filename
            );

            $book->cover = $filename;
        }

        $book->update();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil diedit!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::find($id)->delete();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil dihapus!']);
        $book = Book::find($id);
        if($book->cover !== 'cover_default.jpg') {
            Storage::delete('book_covers/'.$book->cover);
        }
        $book->delete();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil dihapus!']);
    }

     public function addBook(Request $request){

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



