<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->path() != 'admin/login') {
            $request->session()->put('url.intended', $request->url());
        }
        if(!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Không có quyền truy cập');
        }
        if(auth()->user()->role_id == ROLES['user'] || !auth()->user()->active){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')->with('error', 'Không có quyền truy cập');
        }
        return $next($request);
    }
}
