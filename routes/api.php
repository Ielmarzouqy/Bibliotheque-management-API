<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\StatusController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'
  
  ], function ($router) {
  
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

    Route::resource('category',CategoryController::class);
  });
  Route::prefix('admin')->middleware(['api','auth', 'isAdmin'])->group(function(){
    Route::resource('/book', BookController::class); 

  });
  Route::resource('/collection', CollectionController::class);
  Route::resource('/status', StatusController::class);
