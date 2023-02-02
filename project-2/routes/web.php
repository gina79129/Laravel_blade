<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test',function(){
    return view('test');
})->name('testtt');

Route::get('/ttt', function () {
    $data[0] = ['name'=>'gina','age'=>24];
    $data[1] = ['name'=>'Jay','age'=>18];
    $month[] = ['md'=>'1','ad'=>'31'];
    $month[] = ['md'=>'2','ad'=>'28'];
    $month[] = ['md'=>'3','ad'=>'31'];
    $month[] = ['md'=>'4','ad'=>'30'];
    $month[] = ['md'=>'5','ad'=>'31'];
    $month[] = ['md'=>'6','ad'=>'30'];
    $month[] = ['md'=>'7','ad'=>'31'];
    $month[] = ['md'=>'8','ad'=>'31'];
    $month[] = ['md'=>'9','ad'=>'30'];
    $month[] = ['md'=>'10','ad'=>'31'];
    $month[] = ['md'=>'11','ad'=>'30'];
    $month[] = ['md'=>'12','ad'=>'31'];

    // return view('alertindex',['name'=>'gina']);
    // return view('alertindex',['name'=>'Mary'])->with('data',$data);
    return view('alertindex',['name'=>'Mary'])->with('data',$data)->with('title','GoodMorning')->with('month',$month);
});

Route::get('/gotest',function(){
    return view('gotest');
});


