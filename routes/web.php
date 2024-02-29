<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddBankController;

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


Route::get('/get-bank', 'App\Http\Controllers\AddBankController@getBank' );
<<<<<<< HEAD
Route::post('create-bank', [AddBankController::class, 'createBank'])->name('createBank');
Route::post('create-transaction', [AddBankController::class, 'createTransaction'])->name('createTransaction');

Route::get('/get-xp', 'App\Http\Controllers\AddBankController@getXP');  
=======
>>>>>>> 16d45f9e728c26221da04f5766cf0f3b820f0030

