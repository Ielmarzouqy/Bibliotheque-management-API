<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => ['auth:api'],
    'prefix' => 'auth'
  
  ], function ($router) {
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    
    Route::resource('category',CategoryController::class);
    Route::resource('/collection', CollectionController::class);
    Route::resource('/status', StatusController::class);
    Route::resource('/book', BookController::class);
  });   
    Route::group([
      'middleware' => 'api',
      'prefix' => 'auth'
    ], function ($router) {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::get('profile/{id}',[UserController::class,'show']);
    Route::put('profile/{id}', [UserController::class, 'update']);
    
    });