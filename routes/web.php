<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/hello/{name?}', [HelloController::class, 'welcome']);
Route::get('/goat/{first_name}', [HelloController::class, 'showText']);

//Route::get('/settings/', [HelloController::class, 'settings']);
//Route::get('/settings/password', [HelloController::class, 'settings']);
//Route::get('/settings/email', [HelloController::class, 'settings']);
//Route::get('/settings/inforamtion', [HelloController::class, 'settings']);


//old
//Route::prefix('settings')->group(function () {
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
Route::group(['prefix'=>'settings'], function () {
//    Route::get('/password', function () {
//       return 'password';
//    });
    Route::get('/password', [HelloController::class, 'password']);
});


Route::get('/home', [HelloController::class, 'home']);
Route::get('/about', [HelloController::class, 'about']);
