<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\Buku;
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
        return view('users/index');
    }

    public function userActivity() {
        return view('users/activity');
    }

    public function userBorrowed() {
        return view('users/borrowed');
    }
    public function userHistory() {
        return view('users/history');
    }
    public function userFavorite() {
        return view('users/favorite');
    }

    public function userBookDetail($bookCode = null){

        if(!$bookCode) return abort(404);
        
        $book = Buku::where('kode_buku', $bookCode)->first(); 
        
        return view('users/book-detail', ['bookCode' => $bookCode,'book' => $book]);
    }

    public function userProfile(){

        $user_data = Auth::user();

        return view('users/profile', ['user_data' => $user_data]);
    }

    public function Register(){

        $id_user    = $_POST['id_user'];    $username  = $_POST['username'];
        $email      = $_POST['email'];      $password   = $_POST['password'];
        $angkatan   = $_POST['angkatan'];   $role_user  = $_POST['role_user'];

        try{

            if (User::where('id_user', $id_user)->exists()) {
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
                        'id_user'   => $id_user,
                        'username'  => $username,
                        'email'     => $email,
                        'password'  => $password,
                        'angkatan'  => $angkatan,
                        'role_user' => $role_user,
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
