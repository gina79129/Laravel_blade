<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;

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

Route::get('/', [WelcomeController::class,'index']);

Route::get('about',[AboutController::class,'about']);

Route::get('abc',function(){
    return view('about');
});

Route::get('products',function(){
    return view('products');
});

Route::get('services',function(){
    return view('services');
});

// Route::get('/', function () {
//     return 'hello world';
// });

// Route::get('/', function () {
//     return view('welcome');
// });

