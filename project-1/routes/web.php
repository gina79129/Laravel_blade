<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MySampleController;
use App\Http\Controllers\ProvisionServer;
use App\Models\Post;
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

//手動綁定controller
// Route::get('tasks/create',[TaskController::class,'create']);
// Route::post('tasks',[TaskController::class,'store']);

//資源綁定controller (CRUD全部會綁定) 綁定單一controller
Route::resource('tasks', TaskController::class);

//資源綁定controller (CRUD全部回綁定) 綁定多個controller
// Route::resources([
//     'photos' => PhotoController::class,
//     'posts' => PostController::class,
// ]);

//綁定API資源控制器
Route::apiResource('samples',MySampleController::class);

// 使用invoke 綁定單一controller
Route::get('/profile/{id?}',ProvisionServer::class);

// 隱性綁定model getRouteKeyName
Route::get('/posts/{post:slug}',function(Post $post){
    return $post;
});


Route::get('/dashboard', function () {
    return redirect('about');
});


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

// 轉址(全域輔助)
Route::get('/dashboard', function () {
    return redirect('about');
});

//轉址->to
Route::get('/userid', function () {
    return redirect()->to('services');
});

//轉址->route 指向路由名稱
Route::get('/mysample',[MySampleController::class,'index'])->name('MySample.index');
Route::get('/mysampleix', function () {
    return redirect()->route('MySample.index');
});

//轉址->route 指向路由名稱 帶參數
Route::get('/mcid',function(){
    return redirect()->route('members.comments.ttshow',['id'=>3356]);
});

//轉址->action 指定controller->function
Route::get('/aaddd',function(){
    return redirect()->action([WelcomeController::class,'index']);
});


/*
    其他轉址方式
    home():轉址到名為home的路由。refresh()::轉址到用戶目前所在的同一個網頁。away()::可轉址到外部URL，而不需要做預設的URL驗證。
    secure:如同將secure參數設為"true"的to()
    action():可讓你用兩種方式之一連接controller與方法，用字串( redirect()->action('MyController@myMethod')或tuple(redirect()->action([MyController::class,'myMethod']) )
    guest():這是身分驗證系統內部使用的方法；當用戶造訪一個未通過身分驗證的路由時，這個方法會捕捉"其他企圖前往"的路由，再轉址用戶(通常回到登入頁面)
    intended():這也是身分驗證系統內部使用的方法，當用戶成功通過身分證之後，它會捕捉guest()方法儲存的"企圖前往"的URL，並將用戶轉址到那裡。
    redirect()->with():雖然with()的結構類似你可以對著redirect()呼叫的其他方法，但它的差異在於它並未定義你將轉址到哪裡，而是你連同轉址一起傳送的資料。當你將用戶轉址到不同的網頁時，通常會一起傳遞一些資料。你可以親自將資料送至session，不過Laravel有一些方便的方法可以輔助你做這件事。
                       最常見的做法是使用with()來同時傳遞一個內含鍵與值的陣列，或單純傳遞一對鍵與值，可以將with()資料存入session，在下次載入網頁時使用

                       Route::get('redirect-with-key-value',function(){
                            return redirect('dashboard')->with('error',true);
                       });

                       Route::get('redirect-with-array',function(){
                            return redirect('dashboard')->with(['error'=>true,'message'=>'Whoops!']);
                       });

                       withInput()連同表單輸入一起轉址
                       Route::get('from',function(){
                            return redirect('from')->withInput()->with(['error'=>true,'message'=>'whoops!']);
                       });

                       要取得以withInput()傳遞的輸入，最簡單的方式是使用old()輔助函式，它可以用來取得所有舊輸入(old())，如果沒有舊值，則將第二個參數當成預設值。
                       withError($error)連同錯誤一起轉址



*/


/**
 * 中止請求
 * abort()
 * abort_unless()  :false
 * abort_if()      :true
 * 參考網站:https://laravel.com/docs/9.x/helpers#method-abort
 */

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

