<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Lend;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function userIndex(Request $request){

        $user_data = Auth::user();

        if ($request->ajax()) {
            $perPage = 10; // Jumlah data per muatan tambahan
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
        
            $books = DB::table('book')
                ->inRandomOrder()
                ->skip($offset)
                ->take($perPage)
                ->get();
        
            return response()->json($books);
        }

        return view('users/index', ['user_data' => $user_data, 'searchfilter' => 'false']);
    }

    public function dump(){
            // if ($request->ajax()) {
            //     $perPage = 10; // Jumlah data per muatan tambahan
            //     $page = $request->input('page', 1);
            //     $offset = ($page - 1) * $perPage;
            
            //     $books = DB::table('book')
            //         ->inRandomOrder()
            //         ->skip($offset)
            //         ->take($perPage)
            //         ->get();
            
            //     return response()->json($books);
            // }
    }

    public function userActivity() {

        $lends = Lend::where('user_id', Auth::user()->id)->get();
        $borrow = Lend::where('user_id', Auth::user()->id)->where('lend_status', '0')->get();

        return view('users/activity/index', [
            'lends' => $lends,
            'borrow' => $borrow,
        ]);
    }

    public function userBorrowed() {

        $lends = User::find(Auth::user()->id)->lends()->with('book')
                    ->where('lend_status', '=', '0')
                    ->orWhere('lend_status', '=', '3')->get();

        return view('users/activity/borrowed', ['lends' => $lends]);

    }
    public function userHistory() {

        $lends = User::find(Auth::user()->id)->lends()->with('book')
                    ->where('lend_status', '=', '1')
                    ->orWhere('lend_status', '=', '2')->paginate(5);

        return view('users/activity/history', ['lends' => $lends]);

    }
    public function userFavorite() {
        $user_data = Auth::user();

        return view('users/favorite', ['user_data' => $user_data]);
    }

    public function userBookDetail($bookCode = null){

        if(!$bookCode) return abort(404);
        
        $book = Book::where('book_code', $bookCode)->first(); 

        return view('users/book-detail', ['bookCode' => $bookCode,'book' => $book]);
    }

    public function userProfile(){

        $user_data = Auth::user();

        return view('users/profile', ['user_data' => $user_data]);
    }

    public function Register(){

        $id         = $_POST['id'];
        $name       = $_POST['name'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $phone      = $_POST['phone'];
        $role  = $_POST['role'];

        try{

            if (User::where('id', $id)->exists()) {
                return response()->json(
                    [
                        'error'=>true,
                        'message'=>'akun sudah ada'
                    ]
                );
             } else{

                if(User::where('email', $email)->exists()){
                    return response()->json(
                        [
                            'error'=>true,
                            'message'=>'email tersebut sudah terdaftar'
                        ]
                    );  
                } else{
                    $query = User::create([
                        'id'        => $id,
                        'name'      => $name,
                        'email'     => $email,
                        'password'  => $password,
                        'phone'     => $phone,
                        'role'      => $role,
                    ]);
    
                    return response()->json(
                        [
                            'error'=>false,
                            'message'=>'Registrasi Berhasil'
                        ]
                    );
                }
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

    public function Login(Request $request) : RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // if login success, check role, if role is 2 (member) redirect to /
            if(Auth::user()->role === '2') {
                return redirect()->intended('/');
            }

            // but if role is 0 or 1 (admin / staff), redirect to
            return redirect()->intended('admin/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, coba lagi!',
        ])->onlyInput('email');

    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function userChangePassword(Request $request) 
    {

        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmNewPassword = $request->confirmNewPassword;

        if($oldPassword == null || $newPassword == null) {
            return response()->json([
                'error' => 'true',
                'message' => 'data password lama dan baru dibutuhkan!'
            ]);
        }

        // check if old password is same with current password in DB
        if(!Hash::check($request->oldPassword, Auth::user()->password)) {
            return response()->json([
                'error' => 'true',
                'message' => 'Password lama tidak sesuai!'
            ]);

        }

        if(strlen($newPassword) <8) {
            return response()->json([
                'error' => 'true',
                'message' => 'Password baru minimal 8 digit!'
            ]);
        }

        if($newPassword !== $confirmNewPassword) {
            return response()->json([
                'error' => 'true',
                'message' => 'Password konfirmasi tidak cocok!'
            ]);
        }



        
        // update new password
        $user = User::find(Auth::user()->id);
        
        $user->password = bcrypt($newPassword);
        
        $x = $user->update();


        
        return response()->json([
            'error' => 'false',
            'message' => 'Berhasil mengubah password, Harap login kembali',
            'data' => $x
        ]);
    }
}
