<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/UI/Category', function () {
    return view('UI.Category');
});

Route::get('/UI/Home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home.index');

Route::resource('category', \App\Http\Controllers\CategoryController::class);

Route::resource('post', \App\Http\Controllers\PostController::class);


Route::get('/UI/post/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.show');



Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.layout');
})->name('admin');




Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/register');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

