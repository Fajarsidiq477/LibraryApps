<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{

    public function loginView(){
        return view('auth/login');
    }

    public function userView(){
        return view('users/index');
    }

<<<<<<< HEAD
    public function detailBookView() {
        return view('users/book-detail');
    }

    public function profile() {
=======
    public function userBookDetail(){
        return view('users/book-detail');
    }

    public function userProfile(){
>>>>>>> 2df53c398a2ef5d232ba78b3e13285f90d721768
        return view('users/profile');
    }

    public function Register(){

        $id_user    = $_POST['id_user'];    $nama_user  = $_POST['nama_user'];
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
                        'nama_user' => $nama_user,
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

    public function Login(){

        $email      = $_POST['email'];
        $password   = $_POST['password'];

        try{

            $validation = User::select('id_user')->where('email', $email)
                             ->where('password', $password)->exists();

            if ($validation == true) {
                return response()->json(
                    [
                        'error'=>false,
                        'message'=>'Login Berhasil'
                    ]
                );
             } else{
                return response()->json(
                    [
                        'error'=>true,
                        'message'=>'Email/Password Salah'
                    ]
                );
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
}
