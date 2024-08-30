<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('user.auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        $notification = [
            "status" => false,
            "redrirectRoute" => route('user.login'),
            "message" => __('content.login_form.message.error'),
        ];
        try {
            $loginSuccess = $this->authService->login($request);
            $intendedUrl = session()->pull('url.intended', route('user.home'));
            if ($loginSuccess) {
                $notification = [
                    "status" => true,
                    "redrirectRoute" => $intendedUrl,
                    "message" => __('content.login_form.message.success'),
                ];
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
        return response()->json($notification);
    }

    public function logout (Request $request) {
        if(!Auth::check()){
            return redirect()->back()->with('error', __('content.common.logout_error'));
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.home')->with('success', __('content.common.logout_success'));
    }
}
