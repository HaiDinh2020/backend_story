<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->header('Authorization') || ! $this->isValidToken($request->header('Authorization'))) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        return $next($request);
    }

    private function isValidToken($authHeader)
    {
        if($authHeader == 'tokendemo') return true;
        return false;
    }
}
