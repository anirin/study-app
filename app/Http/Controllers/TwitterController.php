<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class TwitterController extends Controller
{
   public function redirectToProvider()
    {
        return Socialite::driver('twitter-oauth-2')->redirect();//この変更が大切
    }
    public function handleProviderCallback()
    {
        dd("call back");
        try {
            $user = Socialite::driver('twitter')->user();
            $socialUser = User::firstOrCreate([
                'token'    => $user->token,
            ], [
                'token'    => $user->token,
                'name'     => $user->name,
                'email'    => $user->email,
                'avatar'   => $user->avatar_original,
            ]);
            Auth::login($socialUser, true);
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        
        return redirect()->route('posts.index');


    }
}
