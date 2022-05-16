<?php


use App\Http\Controllers\PostContactController;
use App\Http\Controllers\PostController;
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

Route::get('/UI/Category/{id}',[\App\Http\Controllers\HomeController::class, 'category']);
Route::get('/UI/Thematic/{id}',[\App\Http\Controllers\HomeController::class, 'thematic']);

Route::get('/UI/Home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home.index');

Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('thematic', \App\Http\Controllers\ThematicController::class);


Route::get('/create',[\App\Http\Controllers\PostController::class,'create']);

Route::get('/UI/post/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');


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


Route::post('/UI/post/{id}', [\App\Http\Controllers\UI\PostController::class, 'store'])->name('comment.store');





Route::get('send-email', [\App\Http\Controllers\Other\SendEmailController::class, 'index']);

Route::get('queue-mail',[\App\Http\Controllers\Other\JobController::class,'processQueue']);



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
    Route::resource('post', \App\Http\Controllers\PostController::class);
});

Route::group(['prefix'=>'/crawl'],function(){
    Route::get('',[\App\Http\Controllers\LinkCrawlController::class,'index'])->name('crawl.index');
    Route::get('/create',[\App\Http\Controllers\LinkCrawlController::class,'create'])->name('crawl.create');
    Route::post('/store',[\App\Http\Controllers\LinkCrawlController::class,'store'])->name('crawl.store');
    Route::get('/{id}',[\App\Http\Controllers\LinkCrawlController::class,'show']);
    Route::get('{id}/edit',[\App\Http\Controllers\LinkCrawlController::class,'edit'])->name('crawl.edit');
    Route::put('update',[\App\Http\Controllers\LinkCrawlController::class,'update'])->name('crawl.update');
    Route::delete('/{id}/delete',[\App\Http\Controllers\LinkCrawlController::class,'destroy'])->name('crawl.destroy');
});

Route::post('post/image_upload', [PostController::class,'upload'])->name('upload');

Route::get('ck',[\App\Http\Controllers\PostController::class,'test']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/UI/timkiem',[\App\Http\Controllers\HomeController::class,'timkiem']);

Route::get('/api',[\App\Http\Controllers\ApiController::class,'category']);




Route::get('contact-form', [PostContactController::class, 'index'])->name('contact');
Route::post('store-form', [PostContactController::class, 'store']);
Route::get('contact-adm',[PostContactController::class,'index2'])->name('contact-adm');
Route::get('contact-adm/{id}',[PostContactController::class,'show']);


Route::get('/manage-comment',[\App\Http\Controllers\CommentController::class,'index'])->name('comment.index');
Route::delete('/manage-comment/{id}/delete',[\App\Http\Controllers\CommentController::class,'destroy']);


Route::post('/email', [\App\Http\Controllers\EmailController::class,'sendEmail'])->name('send.email');
