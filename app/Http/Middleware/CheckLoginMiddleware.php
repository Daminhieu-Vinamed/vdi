<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->status === 1) {
                return $next($request);
            } else {
                Auth::logout();
                $request->session()->flush();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login.getLogin')->with('error', 'Tài khoản của bạn đã bị khóa !');
            }
        }
        return redirect()->route('login.getLogin')->with('error', 'Yêu cầu bạn hãy đăng nhập !');
    }
}
