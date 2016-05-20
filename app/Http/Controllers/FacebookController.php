<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Socialite;

class FacebookController extends Controller
{
    public function getRedirect()
    {       
        return Socialite::driver('facebook')->redirect();   
    }   

    public function getCallback()
    {        
        $facebook = \Socialite::driver('facebook')->user();
        dd($facebook);
    }
}