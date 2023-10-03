<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('login',[LoginController::class,'login'])->name('login');

Route::post('proses_login',[LoginController::class,'proses_login'])->name('proses_login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']],function()
{
  Route::group(['middleware' => ['cek_login:admin']],function(){
    Route::resource('admin',AdminController::class);
  });
  Route::group(['middleware' => ['cek_login:editor']],function(){
    Route::resource('editor',AdminController::class);
  });
});