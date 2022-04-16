<?php

use App\Http\Controllers\UserController;
use App\Models\UserModel;
use Illuminate\Support\Facades\Route;
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
    return view('v_home');
});

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/tambah', [UserController::class, 'tambah']);
//Route::post('/user/tambah', 'UserController@tambah');

Route::get('/masterdata', [UserController::class, 'indexmaster'])->name('master');
Route::get('/masterdata/addmaster', [UserController::class, 'add']);
Route::post('/masterdata/tambah', [UserController::class, 'tambah']);

//Route::get('/', [namacontroller::class, 'namaclassnya']);