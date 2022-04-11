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

Route::get('/user', [UserController::class, 'index']);

Route::get('/masterdata', function () {
    return view('v_masterdata');
});

//Route::get('/', [namacontroller::class, 'namaclassnya']);