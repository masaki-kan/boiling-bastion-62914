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

/*Route::get('/', function () {
|    return view('welcome');
});*/

Auth::routes();

Route::get( '/' , [App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::post( 'image_up' , [App\Http\Controllers\IndexController::class, 'image_up'])->name('image_up');

Route::get( 'createpage/{id}' , [App\Http\Controllers\IndexController::class, 'createpage'])->name('createpage');

Route::post( 'title_up' , [App\Http\Controllers\IndexController::class, 'title_up'])->name('title_up');

Route::get( 'delete/{id}' , [App\Http\Controllers\IndexController::class, 'delete'])->name('delete');

Route::get( 'family/{id}' , [App\Http\Controllers\IndexController::class, 'family'])->name('family');

Route::post( 'family_up' , [App\Http\Controllers\IndexController::class, 'family_up'])->name('family_up');

Route::get( 'familylist' , [App\Http\Controllers\IndexController::class, 'familylist'])->name('familylist');

Route::get( 'familycreate/{id}' , [App\Http\Controllers\IndexController::class, 'familycreate'])->name('familycreate');

Route::post( 'familyupdata' , [App\Http\Controllers\IndexController::class, 'familyupdata'])->name('familyupdata');

Route::get( 'userpage/{id}' , [App\Http\Controllers\IndexController::class, 'userpage'])->name('userpage');

Route::post( 'userup' , [App\Http\Controllers\IndexController::class, 'userup'])->name('userup');

Route::get( 'calender' , [App\Http\Controllers\CalendarController::class, 'index']);

Route::get( 'search/{month}' , [App\Http\Controllers\IndexController::class, 'search'])->name('search');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
