<?php

namespace App\Services\Web;

use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthService.
 *
 * @package namespace App\Services\Web;
 */
class AuthService implements AuthServiceInterface
{
    public function login($request)
    {
        $params = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!Auth::attempt($params)) {
            return false;
        }
        
        $request->session()->regenerate();
        return true;
    }
}
