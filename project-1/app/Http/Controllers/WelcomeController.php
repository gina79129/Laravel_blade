<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        // $bugsnag = new Bugsnag(config('services.bugsnag.key'));
        // return 'Hello world index';
        return view('welcome');
    }
}
