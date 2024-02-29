<?php

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
    return view('home');
});


// Route::get('product/search-advance', 'ProductController@search');
// Route::post('product/search-advance', 'ProductController@getProductSearch');

// Route::get('/search', 'HomeController@search');
// Route::post('/search', 'HomeController@searchFullText')->name('search');

