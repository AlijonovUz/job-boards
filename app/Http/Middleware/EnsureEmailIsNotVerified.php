<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsNotVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->hasVerifiedEmail()) {
            return redirect('/');
        }

        return $next($request);
    }
}
