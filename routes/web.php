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
Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/transactions', 'viewtransaction');
Route::view('/AddCategory', 'addcategory');
Route::view('/Category', 'transpercat');
Route::view('/addtransaction', 'addtransaction');
Route::view('/updatetransaction', 'updatetrans');

Route::get('/login', function(){ return view('login'); });
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/editcategory', [CategoryController::class, 'edit']);
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transaction/add', [TransactionController::class, 'createTransView']);
Route::get('/transaction/{id}/edit', [TransactionController::class, 'editTransView']);
Route::get('/transaction/{id}/delete', [TransactionController::class, 'deleteTransaction']);
Route::get('/transaction/{category}', [TransactionController::class, 'show']);
// Category
Route::post('/login/authLogin', [UserController::class, 'login']);
Route::post('/register/addUser', [UserController::class, 'createUser']);
Route::post('/transaction/add/addTrans', [TransactionController::class, 'createTransaction']);
Route::post('/store', [CategoryController::class, 'store']);
Route::post('/update/{category}', [CategoryController::class, 'update']);
Route::delete('/destroy/{category}', [CategoryController::class, 'destroy']);
