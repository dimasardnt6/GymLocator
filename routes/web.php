<?php

use App\Http\Controllers\GymController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/findGym', [UserController::class, 'findGym']);

Route::get('/detailGym/{id}', [UserController::class, 'show'])->name('detailGym');

// Route::get('/', function () {
//     return view('landingPage');
// });

Route::get('/', [UserController::class, 'landingPage']);
Route::get('/search_gym', [UserController::class, 'search_gym'])->name('search_gym');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('gymLocators.home');
})->name('home')->middleware('auth');


Route::resource('gymLocators', \App\Http\Controllers\GymController::class)
    ->middleware('auth');

Route::get('/home',[HomeController::class, 'index'])->name('index');

Route::get('/search', [GymController::class, 'search'])->name('search');


