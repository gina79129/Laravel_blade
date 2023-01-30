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

Route::get('/greeting',function(){
    return 'Hello world';
});

Route::get('/user/{id}/friends',function($id){
    return 'hello im ' . $id;
});

Route::get('/user/{id?}',function($id='steve'){
    return 'hello im ' . $id;
});

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

// Route::post('/',function(){
//     處理有人傳送一個POST請求到這個路由的情況
// });

// Route::put('/',function(){
//     處理有人傳送一個PUT請求到這個路由的情況
// });

// Route::delete('/',function(){
//     處理有人傳送一個DELETE請求到這個路由的情況
// });

// Route::any('/',function(){
//     處理被傳送到這個路由的任何動作詞請求
// });

// Route::match(['get','post'],'/',function(){
//     處理被傳送到這個路由的GET或POST請求
// });

