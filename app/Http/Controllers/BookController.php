<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Fine;
use App\Models\Lend;
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

        $books = Book::paginate(15);

        return view('admin.books.index', ['books' => $books, 'searchfilter' => 'false']);
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

        // dd($request);

        $validate = $request->validate([
            'book_id' => 'required',
            // 'book_code' => 'required',
            'title' => 'required',
            'category' => 'required',
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

            $filename = str_replace(' ', '_', $request->title) . '_' . uniqid() . '.' .  $extension;

            $path = $request->cover->storeAs('book_covers', $filename);

            $book->cover = $filename;
        } else {
            return redirect('/admin/books/create')->with('error', ['message' => 'Gambar tidak boleh kosong!']);
        }

        $book->id = $request->book_id;
        // $book->book_code = $request->book_code;
        $book->title = $request->title;
        $book->category = $request->category;
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

    public function search()
    {
        $user_data = Auth::user();
        $books = Book::latest();

        if (request('search')) {
            $books->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%')
                ->orWhere('book_code', 'like', '%' . request('search') . '%');
        }

        return view('users/index', [
            'user_data'     => $user_data,
            'searchfilter'  => 'true',
            'search'        => request('search'),
            'available'     => null,
            'category'      => null,
            'books'         => $books->paginate(50)
        ]);
    }

    public function filter()
    {

        $user_data = Auth::user();
        $books = Book::latest();

        $category = request('category');
        $available = request('available');

        if ($category && $available) {
            $books->where('category', $category)
                ->Where('book_status', '0');
        } else if (!$category && $available) {
            $books->Where('book_status', '0');
        } else if ($category && !$available) {
            $books->where('category', $category);
        }

        return view('users/index', [
            'user_data' => $user_data,
            'searchfilter' => 'true',
            'search'        => null,
            'available'     => $available,
            'category'      => $category,
            'books' => $books->paginate(50)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $url = url()->previous();

        // Menggunakan parse_url untuk mendapatkan query string
        $query = parse_url($url, PHP_URL_QUERY);

        // Menggunakan parse_str untuk mengurai query string menjadi array
        parse_str($query, $params);

        // Mengambil angka "page" dari array $params
        $url_page = isset($params['page']) ? $params['page'] : "1";

        $url_search = isset($params['search']) ? $params['search'] : "1";

        $book = Book::find($id);

        return view('admin.books.edit', ['book' => $book, 'url_page' => $url_page, 'url_search' => $url_search]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $book = Book::find($id);

        $validate = $request->validate([
            // 'book_code' => ['required', Rule::unique('book')->ignore($request->book_code)],
            'book_id' => 'required',
            // 'book_code' => 'required',
            'title' => 'required',
            'category' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
            'type' => 'required',
            'book_status' => 'required'
        ], [
            'required' => ':attribute dibutuhkan',
        ]);

        $book->id = $request->book_id;
        // $book->book_code = $request->book_code;
        $book->title = $request->title;
        $book->category = $request->category;
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

            $filename = $request->book_code . '.' .  $extension;

            // delete old cover
            if ($book->cover !== 'cover_default.jpg') {
                Storage::delete('book_covers/' . $book->cover);
            }

            $path = Storage::putFileAs(
                'book_covers/',
                $request->file('cover'),
                $filename
            );

            $book->cover = $filename;
        }

        $book->update();

        $fine = Fine::where('book_id', $id)->update(['book_id' => $request->book_id]);
        $lend = Lend::where('book_id', $id)->update(['book_id' => $request->book_id]);

        // dd($id, $request->book_id);

        return redirect('/search-book-admin?search=' . $request->url_search . '&page=' . $request->url_page)->with('success', ['message' => 'Data buku berhasil diedit!']);
    }

    public function daruratSearch()
    {
        $user_data = Auth::user();
        $books = Book::latest();

        if (request('search')) {
            $a = $books->where('book_code', 'like', '%' . request('search') . '%')->get();
        }

        // dd($a->count());

        if ($a->count() > 0) {
            return redirect('/admin/books/' . $a[0]->id . '/edit');
        } else {
            return redirect('/admin/books/create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::find($id)->delete();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil dihapus!']);
        $book = Book::find($id);
        if ($book->cover !== 'cover_default.jpg') {
            Storage::delete('book_covers/' . $book->cover);
        }
        $book->delete();

        return redirect('/admin/books')->with('success', ['message' => 'Data buku berhasil dihapus!']);
    }

    public function addBook(Request $request)
    {
    }

    public function bookSave(Request $request)
    {

        $user_id    = $request->user_id;
        $book_id    = $request->book_id;

        try {

            if (Favorite::where('user_id', $user_id)->where('book_id', $book_id)->exists()) {
                return response()->json(
                    [
                        'error' => false,
                        'message' => 'Buku ini telah anda tambahkan ke favorit :)'
                    ]
                );
            } else {

                $query = Favorite::create([
                    'user_id' => $user_id,
                    'book_id' => $book_id,
                ]);

                return response()->json(
                    [
                        'error' => false,
                        'message' => 'Buku telah ditambahkan ke favorit :D'
                    ]
                );
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => true,
                    'message' => 'Gagal',
                    'err_message' => $e->getMessage(),
                ]
            );
        }
    }

    public function idChangeIndex()
    {

        return view('admin.idchange.index');
    }

    public function idConfirm()
    {

        $books = Book::latest();

        $a = Book::where('book_code', 'like', '%' . request()->code . '%')->get();

        if ($a->count() > 0) {

            $b = Book::where('category', request()->category)->latest('id')->first();

            $lastId = $b->id;
            $newId  = $lastId + 1;

            $lastCategory   = $b->category;
            $newCategory    = request()->category;

            return view('admin.idchange.confirm', [
                'book_code' => $a[0]->book_code,
                'title' => $a[0]->title,
                'firstId' => $a[0]->id,
                'newId' => $newId,
                'lastCategory' => $lastCategory,
                'newCategory' => $newCategory,
            ]);

        } else {
            return redirect('/admin/books/create');
        }
    }
}
