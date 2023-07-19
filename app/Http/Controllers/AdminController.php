<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function adminBookView(){

        $buku = app(Controller::class)->getBuku();
        
        return view('admin/books')->with('buku', $buku);
    
    }

    public function lendBookView(){
        return view('admin/lendbooks');
    }

    public function adminUserView(){

        $user = app(Controller::class)->getUser();

        return view('admin/users')->with('user', $user);
    }

    public function updateCreateUser(Request $request){

        $nim        = $request->nim;
        $username   = $request->username;
        $email      = $request->email;
        $password   = $request->password;
        $number     = $request->number;
        $role       = $request->role;

        try{
            User::updateOrCreate(
                ['nim' => $nim],
                [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'number' => $number,
                    'role' => $role,
                ]
            );

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
                    'message'=>"User Tidak Berhasil Dibuat",
                    'err_message'=>$e->getMessage()
                ]
            );
        }
    
    }
}
