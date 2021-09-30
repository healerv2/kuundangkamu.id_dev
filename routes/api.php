<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//route api
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\TemplateApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', [AuthApiController::class, 'login']);
Route::post('auth/register', [AuthApiController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductApiController::class, 'GetProduct']);
    }); 
    Route::prefix('/template')->group(function () {
        Route::get('/', [TemplateApiController::class, 'GetTemplate']);
    });
});
