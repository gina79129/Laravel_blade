<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\InvitationController;
// use Illuminate\Support\Facades\URL;


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
// 參考網站
// https://laravel.com/docs/9.x/routing
Route::get('/', [WelcomeController::class,'index']);

Route::get('about',[AboutController::class,'about']);

// Route::get('invitations/{invitation}/{answer}',function($invitation,$answer){
//     return URL::signedRoute('invitations',['invitation'=>$invitation,'answer'=>$answer]);
// })->name('invitations');
Route::get('invitations/{invitation}/{answer}',[InvitationController::class,'inv'])->name('invitations');
Route::get('invtt/{invitation}/{answer}',[InvitationController::class,'invtt'])->name('invtt')->middleware('signed');


Route::get('/greeting',function(){
    return 'Hello world';
});

Route::get('/user/{id}/friends',function($id){
    return 'hello im ' . $id;
});

// 參數依順序注入，跟名稱無關
Route::get('/posts/{post}/comments/{comment}',function($PId,$CId){
    return $PId ." / ".$CId;
});

Route::get('/members/{id}',[MembersController::class,'show'])->name('members.show');

Route::get('/all/{id}/profile',function(){
    return view('services');
})->name('profile');

// 使用正則表達式來限制路由
Route::get('/tt/{id}',function($id){
    return 'hello im tt ' .$id;
})->where('id','[0-9]+');

Route::get('/hh/{username}',function($username){
    return 'im hh '.$username;
})->where('username','[A-Za-z]+');

Route::get('/mm/{id}/{slug}',function($id,$slug){
    return 'mm '.$id.' '.$slug;
})->where('slug','[A-Za-z]+')->name('mmgo');

// Route::get('/mm/{id}/{slug}',function($id,$slug){
//     return 'mm '.$id.' '.$slug;
// })->where(['id'=>'[0-9]+','slug'=>'[A-Za-z]+']);

Route::get('/user/{id?}',function($id='steve'){
    return 'hello im ' . $id;
});

//群組前綴 http://project-1.test:8000/family/abc
Route::prefix('family')->group(function(){
        Route::get('/abc',function(){
            return view('about');
        });

        Route::get('/products',function(){
            return view('products');
        });
});

// 子網域路由
Route::domain('project-1.test')->group(function(){
    Route::get('omg',function(){
        return "i'm omg!!";
    });
});

// 參數化的子網域路由
Route::domain('{account}.test')->group(function(){
    Route::get('/',function($account){

    });

    Route::get('/animal/{id}',function($account,$id){
        return $account.$id;
    });
});


Route::get('services',function(){
    return view('services');
});

Route::name('members.')->prefix('members')->group(function(){
    Route::name('comments.')->prefix('comments')->group(function(){
        Route::get('{id}',function(){
            return view('show');
        })->name('ttshow');
    });
});

// 處理不匹配的路由導向
Route::fallback(function(){
    return "你走錯地方囉";
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

