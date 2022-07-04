<?php

use App\Http\Controllers\Client\ReferralLinkController;
use App\Http\Controllers\Client\WalletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\AdminController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::prefix('clients')->name('clients.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::get('/login',[ClientController::class,'login'])->name('login');
        Route::get('/register',[ClientController::class,'register'])->name('register');
        Route::post('/create',[ClientController::class,'create'])->name('create');
        Route::post('/check',[ClientController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('/dsashboard',[ClientController::class,'ShowDashboard'])->name('dashboard');
        Route::prefix('Referral_Link')->name('Referral_Link.')->group(function(){
            Route::get('/',[ReferralLinkController::class,'index'])->name('index');
            Route::get('/create',[ReferralLinkController::class,'create'])->name('create');
            Route::post('/store',[ReferralLinkController::class,'store'])->name('store');
            Route::get('/showRegister',[ReferralLinkController::class,'showRegister'])->name('showRegister');
            Route::delete('/destroy/{id}',[ReferralLinkController::class,'destroy'])->name('destroy');
        });

        Route::prefix('Wallet')->name('Wallet.')->group(function(){
            Route::get('/',[WalletController::class,'index'])->name('index');
            Route::get('/create',[WalletController::class,'index'])->name('create');
        });

        Route::post('/logout',[ClientController::class,'logout'])->name('logout');
        Route::get('/add-new',[ClientController::class,'add'])->name('add');
    });

});


Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::get('/login',[AdminController::class,'Login'])->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'ShowDashboard'])->name('dashboard');
        Route::get('/Users',[AdminController::class,'showUsers'])->name('Users');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});
