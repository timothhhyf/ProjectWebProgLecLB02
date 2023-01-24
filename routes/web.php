<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Route nembak buat frontend
// Route::view('/login', 'login');
Route::view('/register', 'register')->middleware('afterLoginCheck');
// Route::view('/transactions', 'viewtransaction');
// Route::view('/AddCategory', 'addcategory');
// Route::view('/Category', 'transpercat');
// Route::view('/addtransaction', 'addtransaction');
// Route::view('/updatetransaction', 'updatetrans');
Route::view('/profile', 'updateprofile');

Route::get('/login', function(){ return view('login'); })->middleware('afterLoginCheck');
Route::get('/logout', [UserController::class, 'logout'])->middleware('loginCheck');
Route::get('/category', [CategoryController::class, 'index'])->middleware('loginCheck');
Route::get('/editcategory', [CategoryController::class, 'edit'])->middleware('loginCheck');
Route::get('/transactions', [TransactionController::class, 'index'])->middleware('loginCheck');
Route::get('/transactions/latest', [TransactionController::class, 'sortLatest'])->middleware('loginCheck');
Route::get('/transactions/oldest', [TransactionController::class, 'sortOldest'])->middleware('loginCheck');
Route::get('/transaction/add', [TransactionController::class, 'createTransView'])->middleware('loginCheck');
Route::get('/transaction/{id}/edit', [TransactionController::class, 'editTransView'])->middleware('loginCheck');
Route::get('/transaction/{id}/delete', [TransactionController::class, 'deleteTransaction'])->middleware('loginCheck');
Route::get('/transaction/{category}', [TransactionController::class, 'show'])->middleware('loginCheck');
// Category
Route::post('/login/authLogin', [UserController::class, 'login'])->middleware('afterLoginCheck');
Route::post('/register/addUser', [UserController::class, 'createUser'])->middleware('afterLoginCheck');
Route::post('/transaction/add/addTrans', [TransactionController::class, 'createTransaction'])->middleware('loginCheck');
Route::post('/transcation/{id}/edit/editTrans', [TransactionController::class, 'editTransaction'])->middleware('loginCheck');
Route::post('/transaction/search', [TransactionController::class, 'searchTransaction'])->middleware('loginCheck');
Route::post('/transaction/{id}/search', [TransactionController::class, 'searchTransPerCat'])->middleware('loginCheck');
Route::post('/store', [CategoryController::class, 'store'])->middleware('loginCheck');
Route::post('/update/{category}', [CategoryController::class, 'update'])->middleware('loginCheck');
Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->middleware('loginCheck');
