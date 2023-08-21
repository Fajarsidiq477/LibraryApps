<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\Buku;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{


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
        $pinjam = app(Controller::class)->getDataPinjam();

        $collection = Collection::make($pinjam);

        $data_pinjam = $collection->filter(function ($item) use ($user_data) {
            return $item['nim'] == $user_data->nim && $item['status_pinjam'] == 0 || $item['status_pinjam'] == 3;
        });

        return view('users/borrowed', ['user_data' => $user_data, 'data_pinjam' => $data_pinjam]);

    }
    public function userHistory() {

        $user_data = Auth::user();

        // $pinjam = app(Controller::class)->getPinjam();
        $pinjam = app(Controller::class)->getDataPinjam();

        $collection = Collection::make($pinjam);

        $data_pinjam = $collection->filter(function ($item) use ($user_data) {
            return $item['nim'] == $user_data->nim && $item['status_pinjam'] == 1 || $item['status_pinjam'] == 2;
        });

        return view('users/history', ['user_data' => $user_data, 'data_pinjam' => $data_pinjam]);
    }
    public function userFavorite() {
        
        $user_data = Auth::user();
        $simpan = app(Controller::class)->getDataSimpan();
        
        $collection = Collection::make($simpan);
        
        $data_simpan = $collection->filter(function ($item) use ($user_data) {
            return $item['nim'] == $user_data->nim;
        });

        return view('users/favorite', ['user_data' => $user_data, 'data_simpan' => $data_simpan]);
    
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

    public function userChangePassword(Request $request) 
    {

        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmNewPassword = $request->confirmNewPassword;

        // check if old password is same with current password in DB
        if(!Hash::check($request->oldPassword, Auth::user()->password)) {
            return response()->json([
                'error' => 'true',
                'message' => 'Password lama tidak sesuai!'
            ]);

        }

        if($newPassword !== $confirmNewPassword) {
            return response()->json([
                'error' => 'true',
                'message' => 'Password konfirmasi tidak cocok!'
            ]);
        }

        // update new password
        $user = User::find(Auth::user()->nim);

        
        $user->password = bcrypt($newPassword);
        
        $user->save();
        
        return response()->json([
            'error' => 'false',
            'message' => 'Berhasil mengubah password, Harap login kembali'
        ]);
    }
}
