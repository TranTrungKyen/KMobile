<?php

namespace App\Services\Web;

use App\Services\Contracts\AuthAdminServiceInterface;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthAdminService.
 *
 * @package namespace App\Services\Web;
 */
class AuthAdminService implements AuthAdminServiceInterface
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
