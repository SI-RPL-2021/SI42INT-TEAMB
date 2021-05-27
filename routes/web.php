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

//Customer

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', [guestController::class , 'index'])->name('index');
Route::post('/index', [guestController::class , 'indexsearch'])->name('indexsearch');

//Authentication
Auth::routes();

    // dashboard admin
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('admin')->group(function (){
    Route::get('/dashboard', [adminController::class , 'index'])->name('admin.dashboard');
    Route::get('/dashboard/search', [adminController::class , 'indexsearch'])->name('admin.dashboard');

    //admin product feature

    Route::get('/products' , [adminController::class , 'products'])->name('admin.products');
    Route::get('/products/search/' , [adminController::class , 'productssearch'])->name('admin.productssearch');
    Route::get('/products/add' , [adminController::class , 'productsadd'])->name('admin.addproducts');
    Route::post('/products/add' , [adminController::class , 'productsadds'])->name('admin.addproducts');
    Route::get('/products/edit/{id}' , [adminController::class , 'productsedit'])->name('admin.productedits');
    Route::post('/products/edit/{id}' , [adminController::class , 'productsedits'])->name('admin.productedits');

    // admin user feature
    Route::get('/usersadd' , [adminController::class , 'usersadd'])->name('admin.usersadd');
    Route::post('/users/usersadd' , [RegisterController::class , 'addusers'])->name('admin.usersadd');
    Route::get('/users/remove/{id}' , [adminController::class , 'usersremove'])->name('admin.userremove');
    Route::get('/users' , [adminController::class , 'users'])->name('admin.users');
    Route::get('/users/{theme}' , [adminController::class , 'userstheme'])->name('admin.userstheme');
    Route::post('/users/search/' , [adminController::class , 'usersearch'])->name('admin.userssearch');

    

    });
    Route::prefix('cashier')->group(function(){
        Route::get('/detail/{id}/{req}' , [cashierController::class , 'detail'])->name('cashier.detail');
    });
