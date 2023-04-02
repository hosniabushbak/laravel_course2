<?php

use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/', function () {
        return view('welcome');
    });



    Route::get('/hello/{name?}', [HelloController::class, 'welcome'])->name('welcome');
    Route::get('/goat/{first_name}', [HelloController::class, 'showText']);

//Route::get('/settings/', [HelloController::class, 'settings']);
//Route::get('/settings/password', [HelloController::class, 'settings']);
//Route::get('/settings/email', [HelloController::class, 'settings']);
//Route::get('/settings/inforamtion', [HelloController::class, 'settings']);


//old
//Route::prefix('settings')->middleware('auth')->group(function () {
//    Route::get('/', function () {
//        return 'settings';
//    });
//    Route::get('/password', function () {
//       return 'password';
//    });
//    Route::get('/password', [HelloController::class, 'password']);
//    Route::get('/email', [HelloController::class, 'email']);
//});

// new group
//Route::group(['prefix'=>'settings', 'middleware'=>'auth'], function () {
    Route::group(['prefix'=>'settings'], function () {
//    Route::get('/password', function () {
//       return 'password';
//    });
        Route::get('/password', [HelloController::class, 'password']);
        Route::get('/password2', [HelloController::class, 'password']);
    });


    Route::get('/', [HelloController::class, 'home']);
    Route::get('/aboutsafsafasfasfsafasfasf', [HelloController::class, 'about'])->name('website.about')->middleware('auth');
    Route::get('/about/asd', [HelloController::class, 'about']);
//
//Route::get('/login', function () {
//    return 'login';
//})->name('login');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::group(['prefix'=>'products', 'as' => 'products.'], function() {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/emails', [ProductController::class, 'emails'])->name('emails');
    });

//    Route::resource('warehouse', WarehouseController::class);
//    Route::group(['prefix'=>'warehouse', 'as' => 'warehouse.'], function() {
//
//    });

});



