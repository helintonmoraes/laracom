<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback()
    {
        dd('test');
        $facebook = \Socialite::driver('facebook')->user();
        dd($facebook);
    }
}