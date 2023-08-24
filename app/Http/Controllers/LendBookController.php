<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

use Carbon\Carbon;

class LendBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lends = Lend::All();

        return view('admin.lendBooks', ['lends' => $lends]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lendBooks.create');
    }

    public function create1(Request $request) {

        
        $user = User::find($request->id);

        return view('lendBooks.create1', ['id' => $request->id]);
    }

    public function create2(Request $request) {
        // dd(Carbon::now->formatLocalized('%A %d %B %Y'););

        $booksCode = [$request->bookCodeInput1, $request->bookCodeInput2, $request->bookCodeInput3, $request->bookCodeInput4, $request->bookCodeInput5 ];
        $carbon = Carbon::class;


        $user = User::find($request->id);
        $books = Book::whereIn('book_code', [$request->bookCodeInput1, $request->bookCodeInput2, $request->bookCodeInput3, $request->bookCodeInput4, $request->bookCodeInput5 ])->get();

        return view('lendBooks.create2', ['user' => $user, 'books' => $books, 'carbon' => $carbon]);
    }

    public function getBookById(Request $request) {
            return response()->json('oke');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
