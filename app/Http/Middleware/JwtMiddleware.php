<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Cache;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            try {
                auth()->refresh();
            } catch (JWTException $e) {
                return response()->json(['error' => $e->getMessage()]);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        return $next($request);
    }
}
