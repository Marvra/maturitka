<?php

use App\Http\Controllers\UserPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesPage;
use App\Http\Controllers\PostController;

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


Route::resource('/ok', PostController::class);

Route::get('/search',[PostController::class, 'search']);

Route::get('/category',[PostController::class, 'category']);

Route::get('/' , function(){
    return redirect('/ok');;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ok/categories/{id}', [CategoriesPage::class, 'showCategory']);

Route::get('/ok/user/{id}', [UserPage::class, 'showUser']);
