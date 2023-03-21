<?php

use App\Http\Controllers\Admin\indexController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'admin','prefix' => 'admin', 'as' => 'admin'],function(){


Route::get('/',[indexController::class,'index']);

});