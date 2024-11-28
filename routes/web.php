<?php

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
    return view('welcome');
});

//課題3-3
// use App\Http\Controllers\Admin\AAAController;
// Route::get('/XXX','AAAController::class','bbb');


use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('news/create','add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
});

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create','add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit','edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
