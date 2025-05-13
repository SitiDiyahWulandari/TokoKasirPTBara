<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_id')) {
            return redirect('/login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        return $next($request);
    }
}
