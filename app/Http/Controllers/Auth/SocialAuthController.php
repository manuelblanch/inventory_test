<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
      return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
      //get the user
      //
      //store user info
      $user = Socialite::driver('github')->user();
    }
}
