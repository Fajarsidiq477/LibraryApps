<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;

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

Route::get('/',        [UserController::class,'userIndex'])->name('userIndex');
Route::get('/book/{bookCode?}', [UserController::class,'userBookDetail'])->name('bookDetail');
Route::middleware(['auth'])->group(function() {
    
    // halaman user
    Route::middleware(['checkRole:2'])->group(function() {
        Route::prefix('user')->group(function() {
            Route::get('/profile',      [UserController::class,'userProfile'])->name('profile');
            Route::post('/profile',     [UserController::class,'userChangePassword'])->name('userChangePassword');
            Route::get('/activity',     [UserController::class,'userActivity'])->name('activity');
            Route::get('/borrowed',     [UserController::class,'userBorrowed'])->name('borrowed');
            Route::get('/history',      [UserController::class,'userHistory'])->name('history');
            Route::get('/favorite',     [UserController::class,'userFavorite'])->name('favorite');
        });
    });

    // halaman admin
    Route::middleware(['checkRole:0|1'])->group(function() {
        Route::prefix('admin')->group(function() {
            Route::get('/',             [AdminController::class, 'index'])->name('adminIndex');
            Route::get('/books',        [AdminController::class,'adminBookView'])->name('adminBooks');
            Route::get('/users',        [AdminController::class,'adminUserView'])->name('adminUsers');
            Route::get('/lend-books',   [AdminController::class,'lendBookView'])->name('adminLendBooks'); 
        });
    });
});


// user
Route::get('/login',       [UserController::class,'loginView'])->name('login');
Route::post('/login',      [UserController::class,'Login'])->name('auth');
Route::post('/logout',     [UserController::class,'Logout'])->name('logout');
Route::post('/register',   [UserController::class,'Register']);

    // admin user
    Route::post('/update-create-user',   [AdminController::class,'updateCreateUser']);

// data
Route::get('/get-buku',    [Controller::class,'getBukuJson']);
Route::get('/get-user',    [Controller::class,'getUserJson']);
Route::get('/get-pinjam',  [Controller::class,'getPinjamJson']);

Route::get('/get-data-pinjam',  [Controller::class,'getDataPinjam']);

// buku
Route::post('/update-create-buku', [BukuController::class,'updateCreateBuku']);

//Pinjam
Route::post('/input-data-pinjam', [PinjamController::class,'inputDataPinjam']);

Route::get('/coba', [BukuController::class,'coba']);