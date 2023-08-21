<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;

class AdminController extends Controller
{

    public function index() {
        return view('admin/index');
    }

    public function adminBookView(){

        $book = app(Controller::class)->getBook();
        
        return view('admin/books')->with('book', $book);
    
    }

    public function lendBookView(){

        $lend = app(Controller::class)->getLendData();

        return view('admin/lendbooks', ['lend' => $lend]);
    }

    public function adminUserView(){

        $user = app(Controller::class)->getUser();

        return view('admin/users')->with('user', $user);
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
}
