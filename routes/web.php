<?php

use App\Http\Controllers\TruATMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddBankController;

use App\Http\Controllers\TestController;

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
// Route::get('/filter', [TruATMController::class, 'getPageFilter']);
Route::get('/listbank', [TruATMController::class, 'getATM']);
Route::get('/pagefilter', [TruATMController::class, 'getPageFilter']);
Route::get('/listpgd', [TruATMController::class, 'getPGD']);
=======


Route::get('/get-bank', 'App\Http\Controllers\AddBankController@getBank' );
Route::post('create-bank', [AddBankController::class, 'createBank'])->name('createBank');
Route::post('create-transaction', [AddBankController::class, 'createTransaction'])->name('createTransaction');

Route::get('/get-xp', 'App\Http\Controllers\AddBankController@getXP');  
=======
// Route::get('product/search-advance', 'ProductController@search');
// Route::post('product/search-advance', 'ProductController@getProductSearch');

// Route::get('/search', 'HomeController@search');
// Route::post('/search', 'HomeController@searchFullText')->name('search');

Route::get('/test', [TestController::class, 'index'])->name('test');

Route::get('/testjson', [TestController::class, 'testjson'])->name('testjson');

Route::get('/listbank', [TestController::class, 'testBank'])->name('testBank');

//getListBankAccept
Route::get('/getListBankAccept/{dichvu}/{idbank}', [TestController::class, 'getListBankAccept'])->name('getListBankAccept');

//getListATMOfBank
Route::get('/getListATMOfBank/{id}/{dichvu}', [TestController::class, 'getListATMOfBank'])->name('getListATMOfBank');
