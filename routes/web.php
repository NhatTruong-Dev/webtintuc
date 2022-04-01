<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('/UI/Category',[\App\Http\Controllers\HomeController::class, 'category'])->name('home.category');

Route::get('/UI/Home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home.index')->middleware('cacheResponse:600');

Route::resource('category', \App\Http\Controllers\CategoryController::class);

Route::resource('post', \App\Http\Controllers\PostController::class);


Route::get('/UI/post/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


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


Route::post('/UI/post/{id}', [\App\Http\Controllers\HomeController::class, 'postComment'])->name('home.postComment');





Route::get('send-email', [\App\Http\Controllers\SendEmailController::class, 'index']);

Route::get('queue-mail',[\App\Http\Controllers\JobController::class,'processQueue']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/** Facebook OAuth routes */
Route::get('auth/facebook',[\App\Http\Controllers\Login\FacebookLoginController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [\App\Http\Controllers\Login\FacebookLoginController::class, 'loginWithFacebook']);

/** Google OAuth routes */
Route::get('auth/google',[\App\Http\Controllers\Login\GoogleController::class, 'googleRedirect']);
Route::get('auth/google/callback', [\App\Http\Controllers\Login\GoogleController::class, 'loginWithGoogle']);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('role', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
