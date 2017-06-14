<?php

namespace App\Http\Controllers\Auth\LoginServices;

use App\User;

class GithubAuth implements LoginAuth
{
    /**
     * Finds the user from the provider in the database.
     *
     * @param $user
     *
     * @return mixed
     */
    public static function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name'      => $githubUser->name,
            'email'     => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar'    => $githubUser->avatar,
            'password'  => bcrypt('secret'),
        ]);
    }
}
