<?php

use App\Http\Controllers\Api\NotifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::resource('notify', NotifyController::class)->only([
    'index', 'show'
]);

//Route::post('post', \App\Http\Controllers\Api\PostController::class, 'store');

Route::resource('post',\App\Http\Controllers\Api\PostController::class);

Route::group(['prefix'=>'/post'],function(){
    Route::get('',[\App\Http\Controllers\Api\PostController::class,'index'])->name('post.index');
    Route::get('/create',[\App\Http\Controllers\Api\PostController::class,'create'])->name('post.create');
    Route::post('/store',[\App\Http\Controllers\Api\PostController::class,'store'])->name('post.store');
    Route::get('/{id}',[\App\Http\Controllers\Api\PostController::class,'show']);
    Route::get('{id}/edit',[\App\Http\Controllers\Api\PostController::class,'edit'])->name('post.edit');
    Route::put('update',[\App\Http\Controllers\Api\PostController::class,'update'])->name('post.update');
    Route::delete('/{id}/delete',[\App\Http\Controllers\PostController::class,'destroy'])->name('post.destroy');
});

Route::resource('category',\App\Http\Controllers\Api\CategoryController::class);

Route::resource('user',\App\Http\Controllers\Api\UserController::class);

Route::resource('role',\App\Http\Controllers\Api\RoleController::class);

Route::resource('thematic',\App\Http\Controllers\Api\ThematicContrller::class);

Route::get('dashboard',[\App\Http\Controllers\Api\DashboardController::class,'index']);

Route::post('uploading-file-api', [\App\Http\Controllers\API\FileUploadController::class, 'upload']);
