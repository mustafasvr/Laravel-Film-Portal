<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\filmController;
use App\Http\Controllers\Admin\indexController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Public\categoriesController;
use App\Http\Controllers\Admin\filmCategoryController;
use App\Http\Controllers\Admin\SettingsGroupController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Public\Film\FilmDetailsController;
use App\Http\Controllers\Public\indexController as PublicIndexController;
use App\Http\Controllers\Public\Profile\ProfileController;

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

Auth::routes();

Route::get('/', [PublicIndexController::class, 'index'])->name('home');


// Public

Route::name('categories.')->group(function () {
    Route::get('kategoriler/{group}', [categoriesController::class, 'index'])->name('index');
});


Route::name('profile.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('index');
        Route::post('/edit/update/{name}.{id}', [ProfileController::class, 'update'])->name('edit.update');
    });
});


Route::name('film.')->group(function () {
    Route::get('film/{name}.{id}', [FilmDetailsController::class, 'index'])->name('index');
    Route::post('film/{name}.{id}/add-reply', [FilmDetailsController::class, 'store'])->name('comment');
});





// Admin 

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::middleware('auth', 'admin.control')->group(function () {
            Route::get('/', [indexController::class, 'index'])->name('index');

            // AYARLAR
            Route::name('settings.')->group(function () {
                Route::get('/settings', [SettingsGroupController::class, 'index'])->name('index');
                Route::get('/settings/groups/{group}', [SettingsController::class, 'index'])->name('group');
                Route::post('/settings/groups/{group}/update', [SettingsController::class, 'update'])->name('update');

                Route::get('/settings/groups/{group}/create', [SettingsController::class, 'create'])->name('create');
                Route::post('/settings/create/add', [SettingsController::class, 'store'])->name('store');
                Route::get('/settings/destroy/{id}', [SettingsController::class, 'destroy'])->name('destroy');

                Route::name('group.')->group(function () {
                    Route::get('/settings/group/create', [SettingsGroupController::class, 'create'])->name('create');
                    Route::post('/settings/group/create/add', [SettingsGroupController::class, 'store'])->name('store');
                    Route::get('/settings/group/edit/{id}.{group}', [SettingsGroupController::class, 'edit'])->name('edit');
                    Route::post('/settings/group/edit/update/{id}', [SettingsGroupController::class, 'update'])->name('edit.update');
                    Route::get('/settings/group/destroy/{id}', [SettingsGroupController::class, 'destroy'])->name('destroy');
                });
            });

            // FİLMLER
            Route::name('film.')->group(function () {
                Route::get('/film', [filmController::class, 'index'])->name('index');
                Route::get('/filmcek', [filmController::class, 'create'])->name('cek');
            });

            // KATEGORİLER
            Route::name('categories.')->group(function () {
                Route::get('/categories', [filmCategoryController::class, 'index'])->name('index');
                Route::get('/categories/insert', [filmCategoryController::class, 'create'])->name('insert');
                Route::get('/categories/edit/{id}', [filmCategoryController::class, 'edit'])->name('edit');
                Route::post('/categories/edit/update/{id}', [filmCategoryController::class, 'update'])->name('edit.update');
                Route::get('/categories/delete/{id}', [filmCategoryController::class, 'delete'])->name('delete');
            });


            // KULLANICILAR
            Route::name('user.')->group(function () {
                Route::get('/user', [UserController::class, 'index'])->name('index');
                Route::get('/user/insert', [UserController::class, 'create'])->name('insert');
                Route::get('/user/edit/{name}.{id}', [UserController::class, 'edit'])->name('edit');
                Route::post('/user/edit/update/{name}.{id}', [UserController::class, 'update'])->name('edit.update');
                Route::get('/user/delete/{name}.{id}', [UserController::class, 'destroy'])->name('delete');
            });
        });
    });
});
