<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function bookView(){
        return view('admin/books');
    }

    public function lendBookView(){
        return view('admin/lendbooks');
    }

    public function userView(){
        return view('admin/users');
    }
}
