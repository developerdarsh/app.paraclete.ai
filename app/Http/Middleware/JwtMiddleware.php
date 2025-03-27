<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            // Get user from token.
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['error' => 'token_expired'], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error' => 'token_invalid'], 401);
            } else {
                return response()->json(['error' => 'token_not_found'], 401);
            }
        }

        // If user was found, proceed with the request.
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return $next($request);
    }
}
