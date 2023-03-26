<?php

use App\Http\Controllers\Admin\filmCategoryController;
use App\Http\Controllers\Admin\filmController;
use App\Http\Controllers\Admin\indexController;
use App\Http\Controllers\Public\indexController as PublicIndexController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PublicIndexController::class,'index'])->name('home');


Route::group(['namespace' => 'admin','prefix' => 'admin'],function(){


Route::get('/',[indexController::class,'index'])->name('admin');
Route::get('/film',[filmController::class,'index'])->name('film');
Route::get('/filmcek',[filmController::class,'create']);


Route::get('/kategori',[filmCategoryController::class,'index'])->name('categories');
Route::get('/kategoricek',[filmCategoryController::class,'create']);


});