<?php

use App\Http\Controllers\AristController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/login', [MemberController::class, 'login'])->name('login');
Route::get('/logout', [MemberController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::get('edit-profile', [MemberController::class, 'editProfile'])->name('editProfile');
Route::post('edit-profile', [MemberController::class, 'editProfilePost'])->name('edit-profile.post');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::prefix('arists')->as('arist.')->group(function () {
    Route::get('/', [AristController::class, 'arist'])->name('index');
    Route::get('/{id}', [AristController::class, 'detail'])->name('detail');
    Route::post('/{id}/event', [AristController::class, 'storeEvent'])->name('event.store');
    Route::get('/{id}/add-video', [AristController::class, 'addVideo'])->name('addVideo');
    Route::post('/{id}/add-video', [AristController::class, 'addVideoPost'])->name('addVideo.post');
    Route::get('arists/register', [AristController::class, 'register'])->name('register');
    Route::post('arists/register', [AristController::class, 'store'])->name('store');
});

Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contactUs');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::view('layout', 'layouts.index');
