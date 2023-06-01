<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateStudents
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard('students')->check() == false) {

            if (Auth::guard('teachers')->check() == false) {

                return redirect()->route('students.login');
                
            }

        }
        return $next($request);
    }
}
