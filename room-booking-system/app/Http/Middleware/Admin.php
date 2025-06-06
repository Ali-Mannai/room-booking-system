<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have admin access.');
    }
}