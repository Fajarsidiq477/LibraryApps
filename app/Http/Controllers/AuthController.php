<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

use App\Models\User;

class AuthController extends Controller
{
    public function loginView(){
        if(Auth::check()) {
            return redirect('userIndex');
        }

        return view('auth/login');
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
}
