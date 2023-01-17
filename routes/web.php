<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


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

Route::get('/login', function(){
    return view('login');
});
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/addcategory', [CategoryController::class, 'create']);
Route::get('/editcategory', [CategoryController::class, 'edit']);

Route::post('/login/authLogin', [UserController::class, 'login']);

// Category
Route::post('/store', [CategoryController::class, 'store']);
Route::post('/update/{category}', [CategoryController::class, 'update']);
Route::delete('/destroy/{category}', [CategoryController::class, 'destroy']);
