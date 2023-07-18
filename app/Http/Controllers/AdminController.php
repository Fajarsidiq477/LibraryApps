<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
