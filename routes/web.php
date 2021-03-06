<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeLoginController;
use App\Http\Controllers\HomeRegisterController;
//superadmin
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\DataUserController;
use App\Http\Controllers\Backoffice\ProductController;
use App\Http\Controllers\Backoffice\TemplateController;

//accounting
use App\Http\Controllers\Accounting\DashAccontingController;

//visitor
use App\Http\Controllers\Visitor\DashVisitorController;
use App\Http\Controllers\Visitor\ListTemplateController;
use App\Http\Controllers\Visitor\ListUndanganController;
use App\Http\Controllers\Visitor\ProfilController;
use App\Http\Controllers\Visitor\CheckoutsController;
use App\Http\Controllers\Visitor\OrdersController;

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
Route::get('register',[HomeRegisterController::class,'index'])->name('register');
Route::post('register',[HomeRegisterController::class,'RegisterUsers'])->name('registers');
Route::post('send/otp',[HomeRegisterController::class,'sendWhatsappOtp'])->name('send_otp');
Route::get('auth/google', [HomeRegisterController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [HomeRegisterController::class, 'handleGoogleCallback']);


Route::get('signup', function () {
    return view('visitor/apps/signup');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['ceks_login:superadmin']], function () {

            Route::prefix('/superadmin')->group(function() {
                //dashboard
                Route::get('/dashboard',[DashboardController::class,'index']);
                //user
                Route::get('/user',[DataUserController::class,'index']);
                Route::get('/user/ajax',[DataUserController::class,'GetUser']);
                Route::get('/user/add',[DataUserController::class,'ShowAddUser']);
                Route::post('/user/save',[DataUserController::class,'AddUser']);
                Route::get('/user/edit/{id}',[DataUserController::class,'EditUser']);
                Route::post('/user/update/{id}',[DataUserController::class,'UpdateUser']);
                Route::get('/user/delete/{id}',[DataUserController::class,'DeleteUser']);
                //product
                Route::get('/product',[ProductController::class,'index']);
                Route::get('/product/ajax',[ProductController::class,'GetProduct']);
                Route::get('/product/add',[ProductController::class,'ShowAddProduct']);
                Route::post('/product/save',[ProductController::class,'AddProduct']);
                Route::get('/product/edit/{id}',[ProductController::class,'EditProduct']);
                Route::post('/product/update/{id}',[ProductController::class,'UpdateProduct']);
                Route::get('/product/delete/{id}',[ProductController::class,'DeleteProduct']);
                //template
                 Route::get('/template',[TemplateController::class,'index']);
                 Route::get('/template/ajax',[TemplateController::class,'GetTemplate']);
                 Route::get('/template/add',[TemplateController::class,'ShowAddTemplate']);
                 Route::post('/template/save',[TemplateController::class,'AddTemplate']);
                 Route::get('/template/edit/{id}',[TemplateController::class,'EditTemplate']);
                 Route::post('/template/update/{id}',[TemplateController::class,'UpdateTemplate']);
                 Route::get('/template/delete/{id}',[TemplateController::class,'DeleteTemplate']);
            });

        });
    Route::group(['middleware' => ['ceks_login:accounting']], function () {
        
            Route::prefix('/accounting')->group(function() {
                Route::get('/dashboard',[DashAccontingController::class,'index']);
            });

        });
    Route::group(['middleware' => ['ceks_login:visitor']], function () {
        
            Route::prefix('/visitor')->group(function() {
                Route::get('/public',[DashVisitorController::class,'index']);
                Route::get('/order',[OrdersController::class,'Order']);
                Route::get('/order/cart/{id}',[OrdersController::class,'AddOrders']);
                Route::get('/template',[ListTemplateController::class,'index']);
                Route::get('/undangan',[ListUndanganController::class,'index']);
                Route::get('/checkout',[CheckoutsController::class,'index']);
                Route::get('/profil',[ProfilController::class,'index']);
            });

        });
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
