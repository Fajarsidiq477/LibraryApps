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

// halaman user
Route::get('/',        [UserController::class,'userIndex'])->name('userIndex');
Route::get('/book/{bookCode?}', [UserController::class,'userBookDetail'])->name('bookDetail');
Route::middleware(['auth'])->group(function() {
    Route::get('/user/profile',     [UserController::class,'userProfile'])->name('profile');
    Route::post('/user/profile',     [UserController::class,'userChangePassword'])->name('userChangePassword');
});


// user
Route::get('/login',           [UserController::class,'loginView'])->name('login');
Route::post('/login',           [UserController::class,'Login'])->name('auth');
Route::post('/logout',           [UserController::class,'Logout'])->name('logout');
Route::post('/register',        [UserController::class,'Register']);


// halaman admin
Route::get('/admin-book-view',  [AdminController::class,'adminBookView']);
Route::get('/admin-user-view',  [AdminController::class,'adminUserView']);
Route::get('/lend-book-view',   [AdminController::class,'lendBookView']);
    
    // admin user
    Route::post('/update-create-user',   [AdminController::class,'updateCreateUser']);

// data
Route::get('/get-buku',    [Controller::class,'getBukuJson']);
Route::get('/get-user',    [Controller::class,'getUserJson']);

// buku
Route::post('/update-create-buku', [BukuController::class,'updateCreateBuku']);
// Route::post('/tambah-buku', [BukuController::class,'tambahBuku']);
// Route::post('/update-buku', [BukuController::class,'updateBuku']);


Route::post('/coba', [BukuController::class,'coba']);