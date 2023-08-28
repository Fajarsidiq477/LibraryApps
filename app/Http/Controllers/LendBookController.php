<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        if($user){
            return view('lendBooks.create1', ['id' => $request->id]);
        }else{
            Alert::error('Haha Error', 'Tidak Ada Member Dengan NIM '. $request->id.'!');
            return redirect()->action([LendBookController::class, 'create']);
        }

    }

    public function create2(Request $request) {
        // dd(Carbon::now->formatLocalized('%A %d %B %Y'););

        $books = Book::whereIn('book_code',
                    [$request->bookCodeInput1,
                    $request->bookCodeInput2,
                    $request->bookCodeInput3,
                    $request->bookCodeInput4,
                    $request->bookCodeInput5 
                    ])->get();

        $booksCode = [$request->bookCodeInput1,
                    $request->bookCodeInput2,
                    $request->bookCodeInput3,
                    $request->bookCodeInput4,
                    $request->bookCodeInput5 ];

        $carbon = Carbon::class;
        $user = User::find($request->id);

        if($books->count() != 0){
            for($i=0; $i < $books->count(); $i++){
                //jika buku sedang dipinjam maka return error
                if(Book::find($books[$i]->id)->lend->whereIn('lend_status', '0')->count() != 0){
                    return redirect('/admin/lend-books/create')
                    ->with('error', ['message' => 'Buku dengan kode '.Book::find($books[$i]->id)->book_code.' sedang dipinjam user lain!']);
                }else{
                    if($i == $books->count() - 1){
                        if(Book::find($books[$i]->id)->type != 0){
                            return view('lendBooks.create2', ['user' => $user, 'books' => $books, 'carbon' => $carbon, 'bookscode' => $booksCode]);
                        } else{
                            return redirect('/admin/lend-books/create')
                            ->with('error', ['message' => 'Buku dengan kode '.Book::find($books[$i]->id)->book_code.' memiliki kode R! (Tidak dapat dipinjam)']);
                        }
                    }
                }
            }
        }else{
            return redirect('/admin/lend-books/create')->with('error', ['message' => 'Seluruh kode buku tidak valid!']);
            // Alert::error('Haha Error', 'Tidak Ada Kode Buku Yang Valid');
            // return $this->create1($request , $request->id);
        }
    }

    public function getBookById(Request $request) {
            return response()->json('oke');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $lends = Lend::All();

        for($i=0; $i<$request->total; $i++){
            $lend = Lend::create([
                'user_id'     => $request->user_id,
                'book_id'     => $request->input('bookid'.$i),
                'lend_date'   => $request->lend_date,
                'return_date' => $request->return_date,
                'lend_status' => '0',
            ]);

            $book = Book::where('id', $request->input('bookid'.$i))
                        ->update([
                                'book_status' => '1'
                        ]);
        }

        Alert::success('Alhamdulillah', 'Buku Berhasil Dipinjam :D');
        return redirect()->action([LendBookController::class, 'index']);

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

    public function finishLend(Request $request){
        
        $id = $request->id;

        $lend = Lend::where('id', $id)
                    ->update([
                        'lend_status' => '1'
                    ]);
    
        $book = Book::where('id', Lend::find($id)->book->id)
                    ->update([
                        'book_status' => '0'
                    ]);

        return response()->json([
            'error' => false,
            'message' => 'Buku Dikembalikan!',
            'data' => Lend::find($id)->book->id,
        ]);
        
    }

}
