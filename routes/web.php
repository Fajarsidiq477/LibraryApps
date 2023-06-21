<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// data
Route::get('/get-buku' ,    [Controller::class,'getBuku']);

// user
Route::post('/register' ,   [UserController::class,'Register']);
Route::post('/login' ,      [UserController::class,'Login']);

// buku
Route::post('/tambah-buku' , [BukuController::class,'tambahBuku']);
Route::post('/update-buku' , [BukuController::class,'updateBuku']);


Route::post('/coba' , [BukuController::class,'coba']);