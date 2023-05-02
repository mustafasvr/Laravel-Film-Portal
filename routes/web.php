<?php

use App\Http\Controllers\Admin\filmCategoryController;
use App\Http\Controllers\Admin\filmController;
use App\Http\Controllers\Admin\indexController;
use App\Http\Controllers\Public\indexController as PublicIndexController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SettingsGroupController;
use App\Http\Controllers\Public\categoriesController;
use App\Http\Controllers\Public\Film\FilmDetailsController;
use App\Models\Admin\Settings;
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

Route::get('/', [PublicIndexController::class, 'index'])->name('home');


// Public

Route::name('categories.')->group(function () {
    Route::get('kategoriler/{group}', [categoriesController::class, 'index'])->name('index');
});


Route::name('film.')->group(function () {
    Route::get('film/{name}.{id}', [FilmDetailsController::class, 'index'])->name('index');
});










// Admin 

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/', [indexController::class, 'index'])->name('index');

        // AYARLAR
        Route::name('settings.')->group(function () {
            Route::get('/settings', [SettingsGroupController::class, 'index'])->name('index');
            Route::get('/settings/groups/{group}', [SettingsController::class, 'index'])->name('group');
            Route::get('/settings/groups/{group}/update', [SettingsController::class, 'update'])->name('update');

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
    });
});
