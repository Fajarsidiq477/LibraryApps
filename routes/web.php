<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookDataController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendController;

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
Route::post('/save', [BukuController::class,'bookSave']);

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
            Route::get('/book/{bookCode?}',[UserController::class,'userBookDetail'])->name('userBookDetail');
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
Route::get('/get-book',    [Controller::class,'getBookJson']);
Route::get('/get-user',    [Controller::class,'getUserJson']);
Route::get('/get-lend',  [Controller::class,'getLendJson']);

Route::get('/get-lend-data',  [Controller::class,'getLendData']);

// buku
Route::post('/update-create-book', [BookController::class,'updateCreateBook']);

//Pinjam
Route::post('/input-lend-data', [LendController::class,'inputLendData']);
Route::get('/coba', [Controller::class,'coba']);

// testing
Route::post('/search-book',    [BookDataController::class,'search'])->name('searchBookData');
Route::get('/testing', function() {
    return view('users.nyobaMix');
});