<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class InvitationController extends Controller
{
    public function inv($invitation,$answer){
        $url = URL::signedRoute('invitations',['invitation'=>$invitation,'answer'=>$answer]);
        return view('inv',['url'=>$url]);
    }
}
