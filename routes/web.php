<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeLoginController;
use App\Http\Controllers\Backoffice\DashboardController;

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

Route::get('/', function () {
    return view('login/login');
});

Auth::routes();

Route::get('login',[HomeLoginController::class,'index'])->name('login');
Route::post('action_login',[HomeLoginController::class,'action_login'])->name('action_login');
Route::get('logout',[HomeLoginController::class,'action_logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['ceks_login:superadmin']], function () {
        /*
            Route Khusus untuk role superadmin
        */
            Route::prefix('/superadmin')->group(function() {
                Route::get('/dashboard',[DashboardController::class,'index']);
            });

        });
    Route::group(['middleware' => ['ceks_login:accounting']], function () {
        /*
            Route Khusus untuk role accounting
        */

        });
    Route::group(['middleware' => ['ceks_login:visitor']], function () {
        /*
            Route Khusus untuk role visitor
        */

        });
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
