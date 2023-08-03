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

        $buku = app(Controller::class)->getBuku();
        
        return view('admin/books')->with('buku', $buku);
    
    }

    public function lendBookView(){

        $pinjam = app(Controller::class)->getDataPinjam();

        return view('admin/lendbooks', ['pinjam' => $pinjam]);
    }

    public function adminUserView(){

        $user = app(Controller::class)->getUser();

        return view('admin/users')->with('user', $user);
    }

    public function updateCreateUser(Request $request){

        $mode       = $request->mode;

        $nim        = $request->nim;
        $picture    = $request->file('picture1');
        $name       = $request->name;
        $email      = $request->email;
        $password   = $request->password;
        $phone      = $request->phone;
        $role       = $request->role;

        
        try{
            if($mode == "add"){
                if(User::where('nim', $nim)->exists()){
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

            if(User::where('nim', $nim)->exists()){
                
                $a = User::select('profile_picture')->where('nim', $nim)->get();
                // $b = Buku::select('cover_belakang')->where('kode_buku', $kode_buku)->get();

                if($a[0]->profile_picture != $profile_picture){
                    File::delete('profile_pictures/'.$a[0]->profile_picture);
                }
                // else if($b[0]->cover_belakang != $cover_belakang->getClientOriginalName()){
                //     File::delete('cover_images/'.$b[0]->cover_belakang);
                // }
            
            }

            User::updateOrCreate(
                ['nim' => $nim],
                [
                    'name'              => $name,
                    'email'             => $email,
                    'password'          => bcrypt($password),
                    'phone'             => $phone,
                    'role'              => $role,
                    'profile_picture'   => $profile_picture
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
                    'message'=>"Proses Input Data Gagal",
                    'err_message'=>$e->getMessage()
                ]
            );
        }
    
    }
}
