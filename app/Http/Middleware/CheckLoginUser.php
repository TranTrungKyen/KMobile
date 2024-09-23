<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->path() != 'login') {
            $request->session()->put('url.intended', $request->url());
        }
        if (!auth()->check()) {
            return redirect()->route('user.login')->with('error', 'Vui lòng đăng nhập tài khoản');
        }
        if (auth()->user()->role_id != ROLES['user']) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('user.login')->with('error', 'Không có quyền truy cập');
        } elseif (!auth()->user()->active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('user.login')->with('error', 'Tài khoản của bạn đã bị khóa');
        }

        return $next($request);
    }
}
