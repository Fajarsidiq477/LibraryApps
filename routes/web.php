<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookDataController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LendBookController;
use App\Http\Controllers\UserAdminController;

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

// landingPage
Route::get('/',        [UserController::class,'userIndex'])->name('user.index');
Route::get('/book/{bookCode?}', [UserController::class,'userBookDetail'])->name('bookDetail');
Route::post('/save', [BookController::class,'bookSave']);

Route::middleware(['auth'])->group(function() {
    // halaman user
    Route::middleware(['checkRole:2|1|0'])->group(function() {
        Route::get('/profile',      [UserController::class,'userProfile'])->name('user.profile');
        Route::post('/profile',     [UserController::class,'userChangePassword'])->name('user.change.password');
        Route::prefix('/activity')->group(function() {
            Route::get('/',     [UserController::class,'userActivity'])->name('user.activity');
            Route::get('/borrowed',     [UserController::class,'userBorrowed'])->name('user.borrowed');
            Route::get('/history',      [UserController::class,'userHistory'])->name('user.history');
            Route::get('/favorite',     [UserController::class,'userFavorite'])->name('user.favorite');
            Route::get('/book/{bookCode?}',[UserController::class,'userBookDetail'])->name('userBookDetail');
        });
    });

    // halaman admin
    Route::middleware(['checkRole:0|1'])->group(function() {
        Route::prefix('admin')->group(function() {
            Route::get('/',             [AdminController::class, 'index'])->name('admin.index');
            Route::resources(['/users' => UserAdminController::class]);
            // Route::get('/lend-books',   [AdminController::class,'lendBookView'])->name('admin.lend.books'); 
            Route::resources(['/books' => BookController::class]);
           
            Route::post('/lend-books/create/1', [LendBookController::class, 'create1'])->name('lend-books.create.1'); 
            Route::post('/lend-books/create/2', [LendBookController::class, 'create2'])->name('lend-books.create.2'); 
            Route::post('/finish-lend', [LendBookController::class, 'finishLend'])->name('finishLend'); 
            Route::resources(['/lend-books'  => LendBookController::class]); 
        });
    });
});


// user
Route::get('/login',       [AuthController::class,'login'])->name('login');
Route::post('/login',      [AuthController::class,'auth'])->name('auth');
Route::post('/logout',     [AuthController::class,'logout'])->name('logout');
Route::post('/register',   [AuthController::class,'register']);

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
Route::post('/get-book-by-book-code', [BookDataController::class, 'getBookByBookCode'])->name('data.get-book-by-book-code');
Route::get('/testing', function() {
    return view('users.nyobaMix');
});
