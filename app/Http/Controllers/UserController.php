<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function loginView(){
        if(Auth::check()) {
            return redirect('userIndex');
        }

        return view('auth/login');
    }

    public function userIndex(){
        
        $user_data = Auth::user();

        return view('users/index', ['user_data' => $user_data]);
    }

    public function userActivity() {
        return view('users/activity');
    }

    public function userBorrowed() {
        
        $user_data = Auth::user();

        // $pinjam = app(Controller::class)->getPinjam();
        // $lend = app(Controller::class)->getLednData();

        // $collection = Collection::make($lend);

        // $lend_data = $collection->filter(function ($item) use ($user_data) {
        //     return $item['id'] == $user_data->id && $item['lend_status'] == 0 || $item['lend_status'] == 3;
        // });

        // return view('users/borrowed', ['user_data' => $user_data, 'data_pinjam' => $lend_data]);
        return view('users/borrowed', ['user_data' => $user_data]);

    }
    public function userHistory() {

        $user_data = Auth::user();

        // $pinjam = app(Controller::class)->getPinjam();
        // $lend = app(Controller::class)->getLendData();

        // $collection = Collection::make($lend);

        // $lend_data = $collection->filter(function ($item) use ($user_data) {
        //     return $item['id'] == $user_data->id && $item['lend_status'] == 1 || $item['lend_status'] == 2;
        // });

        // return view('users/history', ['user_data' => $user_data, 'lend_data' => $lend_data]);
        return view('users/history', ['user_data' => $user_data]);
    }
    public function userFavorite() {
        
        $user_data = Auth::user();
        // $simpan = app(Controller::class)->getDataSimpan();
        
        // $collection = Collection::make($simpan);
        
        // $data_simpan = $collection->filter(function ($item) use ($user_data) {
        //     return $item['nim'] == $user_data->nim;
        // });

        // return view('users/favorite', ['user_data' => $user_data, 'data_simpan' => $data_simpan]);
        return view('users/favorite', ['user_data' => $user_data]);
    
    }

    public function userBookDetail($bookCode = null){

        if(!$bookCode) return abort(404);
        
        $book = Book::where('kode_buku', $bookCode)->first(); 
        
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

        // check if old password is same with current password in DB
        if(!Hash::check($request->oldPassword, Auth::user()->password)) {
            
            return Redirect::back()->withErrors(['oldPassword' => 'Password is not match!']);
        }

        $validations = $request->validate([
            'oldPassword' => ['required'],
            'newPassword' => ['required', 'confirmed', 'min:8']
        ]);

        // update new password
        $user = User::find(Auth::user()->nim);

        $user->password = bcrypt($validations['newPassword']);
        
        $user->save();
        

        // logout and redirect to login with message
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return Redirect::route('login')->withErrors(['passwordChanged' => 'Password has been changed. Please login again!']);
    }
}
