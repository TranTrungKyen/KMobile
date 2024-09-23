<?php

namespace App\Services\Web;

use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthService.
 */
class AuthService implements AuthServiceInterface
{
    public function login($request)
    {
        $params = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($params) || Auth::user()->role_id != ROLES['user'] || !Auth::user()->active) {
            Auth::logout();

            return false;
        }

        $request->session()->regenerate();

        return true;
    }
}
