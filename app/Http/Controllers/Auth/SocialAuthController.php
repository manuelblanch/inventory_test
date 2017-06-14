<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

      /**
       * Obtain the user information from GitHub.
       *
       * @return Response
       */
      public function handleProviderCallback()
      {
          try {
              $user = Socialite::driver('github')->stateless()->user();
          } catch (Exception $e) {
              return Redirect::to('auth/github');
          }

          $authUser = $this->findOrCreateUser($user);

          Auth::login($authUser, true);

          return Redirect::to('home');
      }

      /**
       * Return user if exists; create and return if doesn't.
       *
       * @param $githubUser
       *
       * @return User
       */
      private function findOrCreateUser($githubUser)
      {
          if ($authUser = User::where('github_id', $githubUser->id)->first()) {
              return $authUser;
          }

          return User::create([
              'name'      => $githubUser->name,
              'email'     => $githubUser->email,
              'github_id' => $githubUser->id,
              'avatar'    => $githubUser->avatar,
          ]);
      }
}
