<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Category
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/addcategory', [CategoryController::class, 'create']);
Route::post('/store', [CategoryController::class, 'store']);
Route::get('/editcategory', [CategoryController::class, 'edit']);
Route::post('/update/{category}', [CategoryController::class, 'update']);
Route::delete('/destroy/{category}', [CategoryController::class, 'destroy']);
