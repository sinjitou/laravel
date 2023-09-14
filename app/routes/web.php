<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PwdController;

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
    return view('landing');
})->name('landing');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/addpassword', function () {
    return view('addpassword');
})->name('addpassword');

Route::post('/addpasswordreq', [
    PwdController::class, 'addPasswordRequest'
])->name('addpasswordreq');