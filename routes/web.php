<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [TestController::class, 'index'])->name('home');

//getListBankAccept
Route::get('/getListBankAccept/{dichvu}/{idbank}', [TestController::class, 'getListBankAccept'])->name('getListBankAccept');
Route::get('/getListBankAccept/{dichvu}/{idbank}/{range}', [TestController::class, 'getListBankAccept1'])->name('getListBankAccept1');

//getListATMOfBank
Route::get('/getListATMOfBank/{id}/{dichvu}', [TestController::class, 'getListATMOfBank'])->name('getListATMOfBank');