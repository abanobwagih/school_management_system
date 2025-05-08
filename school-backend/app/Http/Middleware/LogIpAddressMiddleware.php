<?php

namespace App\Http\Middleware;

use App\Models\UserSession;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogIpAddressMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $token = $request->bearerToken();
            if ($token) {
                UserSession::where('token', $token)
                    ->where('user_id', Auth::id())
                    ->update(['ip_address' => $request->ip()]);
            }
        }

        return $next($request);
    }
}
