<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateTS
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('teachers')->check() == true ) {
            return $next($request);
        }
        if (Auth::guard('students')->check() == true ) {
            return $next($request);
        }
        return redirect()->route('students.login');
    }
}
