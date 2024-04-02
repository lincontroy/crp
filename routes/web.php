<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;

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

Route::get('register/{refer?}',[UserRegisterController::class,"showRegistrationForm"])->name('register');
Route::post('register',[UserRegisterController::class,"register"])->name('register.submit');

Route::get('/', function () {
    return view('frontend.index');
})->name('index');
