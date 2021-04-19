<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\storageController;
use App\Http\Controllers\cashierController;

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
//Authentication
Auth::routes();

    // dashboard admin
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('admin')->group(function (){
    Route::get('/dashboard', [adminController::class , 'index'])->name('admin.dashboard');
    Route::get('/dashboard/search', [adminController::class , 'indexsearch'])->name('admin.dashboard');

    // admin
    Route::get('/usersadd' , [adminController::class , 'usersadd'])->name('admin.usersadd');
    Route::get('/users/remove/{id}' , [adminController::class , 'usersremove'])->name('admin.userremove');

    });