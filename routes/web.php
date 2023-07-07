<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
    return view('users/index');
});

// authentication
Route::get('/login-view',       [UserController::class,'loginView']);

// user
Route::post('/register',        [UserController::class,'Register']);
Route::post('/login',           [UserController::class,'Login']);

// halaman user
Route::get('/user-view',        [UserController::class,'userView']);
Route::get('/user-book-detail', [UserController::class,'userBookDetail']);
Route::get('/user-profile',     [UserController::class,'userProfile']);

// halaman admin
Route::get('/admin-book-view',  [AdminController::class,'adminBookView']);
Route::get('/admin-user-view',  [AdminController::class,'userView']);
Route::get('/lend-book-view',   [AdminController::class,'lendBookView']);

// data
Route::get('/get-buku',    [Controller::class,'getBukuJson']);
Route::get('/get-user',    [Controller::class,'getUserJson']);

// buku
Route::post('/update-create-buku', [BukuController::class,'updateCreateBuku']);
// Route::post('/tambah-buku', [BukuController::class,'tambahBuku']);
// Route::post('/update-buku', [BukuController::class,'updateBuku']);


Route::post('/coba', [BukuController::class,'coba']);