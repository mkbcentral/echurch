<?php

use App\Http\Controllers\Api\ChurchController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\PreachingController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/register','register');
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user',[AuthController::class,'user']);
    Route::post('/user-profile-update/{id}',[AuthController::class,'updateProfile']);

    Route::controller(EventController::class)->group(function(){
        Route::get('/events','events');
    });


    Route::controller(ChurchController::class)->group(function(){
        Route::get('/churches','churches');
    });

    Route::controller(PreachingController::class)->group(function(){
        Route::get('/preachings/church/{id}','preachings');
    });

    Route::controller(CommentController::class)->group(function(){
        Route::get('/comments/{id}','index');
        Route::post('/comment-create/{id}','store');
        Route::post('/comment-update/{id}','update');
        Route::delete('/comment-delete/{id}','delete');
    });

    Route::controller(LikeController::class)->group(function(){
        Route::post('/event/{id}/like','likeOrUnLike');
    });
});
