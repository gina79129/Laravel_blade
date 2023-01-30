<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class InvitationController extends Controller
{
    // 無期限的signed連結
    public function inv($invitation,$answer){
        $url = URL::signedRoute('invitations',['invitation'=>$invitation,'answer'=>$answer]);
        return view('inv',['url'=>$url]);
    }

    //有期限的signed連結
    public function invtt($invitation,$answer){
        $urltt = URL::temporarySignedRoute('invtt',now()->addMinutes(1),['invitation'=>$invitation,'answer'=>$answer]);
        return view('inv',['url'=>$urltt]);
    }
}
