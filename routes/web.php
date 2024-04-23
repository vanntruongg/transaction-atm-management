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

Route::get('/',[TruATMController::class, 'indexBankPGD'])->name('indexhome');
// Route::get('/filter', [TruATMController::class, 'getPageFilter']);
Route::get('/listbank', [TruATMController::class, 'getATM']);
Route::get('/pagefilter', [TruATMController::class, 'getPageFilter']);
Route::get('/listpgd', [TruATMController::class, 'getPGD']);

//api data base filte
Route::get('/baseData', [TruATMController::class, 'baseData']);
Route::get('/filtered-pgd', [TruATMController::class,'filtered-pgd']);

//get list atm of bank
Route::get('/listatm/{id}', [TruATMController::class, 'getATMOfBank']);
Route::get('/listpgd/{id}', [TruATMController::class, 'getPGDOfBank']);


Route::get('/get-bank', [AddBankController::class, 'getBank']);
Route::post('/create-bank', [AddBankController::class, 'createBank'])->name('createBank');
Route::post('/create-transaction', [AddBankController::class, 'createTransaction'])->name('createTransaction');
Route::post('/create-atm', [AddBankController::class, 'createATM'])->name('createATM');


Route::get('/get-xp', [AddBankController::class, 'getXP']);  

// Route::get('product/search-advance', 'ProductController@search');
// Route::post('product/search-advance', 'ProductController@getProductSearch');

// Route::get('/search', 'HomeController@search');
// Route::post('/search', 'HomeController@searchFullText')->name('search');

Route::get('/getdataInit', [TestController::class, 'index'])->name('home');

//getListBankAccept
Route::get('/getListBankAccept/{dichvu}/{idbank}', [TestController::class, 'getListBankAccept'])->name('getListBankAccept');
Route::get('/getListBankAccept/{dichvu}/{idbank}/{range}', [TestController::class, 'getListBankAccept1'])->name('getListBankAccept1');

//getListATMOfBank
Route::get('/getListATMOfBank/{id}/{dichvu}', [TestController::class, 'getListATMOfBank'])->name('getListATMOfBank');

//get PGD

Route::get('/getPGD/{id}', [TestController::class, 'getPGD']);

