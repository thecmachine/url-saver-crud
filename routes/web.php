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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// Route::post('/storeUrl','UrlsController@storeUrl');
Route::post('/storeUrl',[App\Http\Controllers\UrlsController::class, 'storeUrl']);
// Route::get('/getUrls', 'UrlsController@getUrls');
Route::get('/getUrls', [App\Http\Controllers\UrlsController::class, 'getUrls']);
// Route::post('/deleteUrl/{id}', 'UrlsController@deleteUrl');
Route::post('/deleteUrl/{id}', [App\Http\Controllers\UrlsController::class, 'deleteUrl']);
// Route::post('/editUrls/{id}', 'UrlsController@editUrl');
Route::post('/editUrls/{id}', [App\Http\Controllers\UrlsController::class, 'editUrls']);
