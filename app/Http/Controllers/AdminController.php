<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index() {
        
        $books = Book::all();
        $transactions = Lend::class;
        $carbon = Carbon::class;

        $members = User::where('role', '2')->get();

        return view('admin/index', ['books' => $books, 'transactions' => $transactions, 'members' => $members, 'carbon' => $carbon]);
    }

    public function lendBookView(){

        // $lend = app(Controller::class)->getLendData();

        return view('admin/lendbooks');
    }

    public function adminUserView(){

        $user = app(Controller::class)->getUser();

        return view('admin.users.index')->with('user', $user);
    }

    public function updateCreateUser(Request $request){

        $mode       = $request->mode;

        $id         = $request->id;
        $picture    = $request->file('picture1');
        $name       = $request->name;
        $email      = $request->email;
        $password   = $request->password;
        $phone      = $request->phone;
        $role       = $request->role;

        
        try{
            if($mode == "add"){
                if(User::where('id', $id)->exists()){
                    return response()->json(
                        [
                            'error'=>true,
                            'message'=>"User dengan NIM tersebut telah ada!",
                            'err_message'=>"User dengan NIM tersebut telah ada!"
                        ]
                    );
                }
            }

            if($picture == null){
                $profile_picture = $request->picture2;
            }else{
                $profile_picture = $picture->getClientOriginalName();
                
                $direktori = 'profile_pictures';
                $picture->move($direktori, $profile_picture);
            }

            if(User::where('id', $id)->exists()){
                
                $a = User::select('profile_picture')->where('id', $id)->get();

                if($a[0]->profile_picture != $profile_picture){
                    File::delete('profile_pictures/'.$a[0]->profile_picture);
                }
            
            }

            if($mode == "add"){
                User::updateOrCreate(
                    ['id' => $id],
                    [
                        'name'              => $name,
                        'email'             => $email,
                        'password'          => bcrypt($password),
                        'phone'             => $phone,
                        'role'              => $role,
                        'profile_picture'   => $profile_picture
                    ]
                );
            }else{
                User::updateOrCreate(
                    ['id' => $id],
                    [
                        'name'              => $name,
                        'email'             => $email,
                        'phone'             => $phone,
                        'role'              => $role,
                        'profile_picture'   => $profile_picture
                    ]
                );
            }

            return response()->json(
                [
                    'error'=>false,
                    'message'=>"User Berhasil Dibuat"
                ]
            );

        }catch(\Exception $e){
            return response()->json(
                [
                    'error'=>true,
                    'message'=>"Proses Input Data Gagal",
                    'err_message'=>$e->getMessage()
                ]
            );
        }
    
    }

    public function searchbookadmin(){
        $user_data = Auth::user();
        $books = Book::latest();

        if(request('search')){
            $books
                ->where('category', 'like', '%' . request('search') . '%')
                ->orWhere('id', 'like', '%' . request('search') . '%')
                // ->orWhere('author', 'like', '%' . request('search') . '%')
                ->orWhere('book_code', 'like', '%' . request('search') . '%');
        }

        return view('admin/books/index', ['user_data'     => $user_data,
                                    'searchfilter'  => 'true',
                                    'search'        => request('search'),
                                    'available'     => null,
                                    'category'      => null,
                                    'books'         => $books->paginate(15)]);
    }
}
