<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use App\Services\Contracts\AuthAdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthAdminServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(LoginAdminRequest $request)
    {
        $loginSuccess = $this->authService->login($request);
        if (!$loginSuccess) {
            return redirect()->back()->with('error', __('content.login_form.message.error'));
        }

        return redirect()->intended(route('admin.dashboard'))->with('success', __('content.login_form.message.success'));
    }

    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', __('content.common.logout_error'));
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', __('content.common.logout_success'));
    }
}
