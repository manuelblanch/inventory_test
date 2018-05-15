<?php

// SocialAuthTwitterController.php

namespace App\Http\Controllers;

use App\Services\SocialTwitterAccountService;
use Socialite;

class SocialAuthTwitterController extends Controller
{
    /**
     * Create a redirect method to twitter api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('twitter')->redirect();

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }
    }

    /**
     * Return a callback method from twitter api.
     *
     * @return callable URL from twitter
     */
    public function callback(SocialTwitterAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('twitter')->user());
        auth()->login($user);

        return redirect()->to('/home');
    }
}
