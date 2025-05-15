<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_name') || !session()->has('user_role')|| !session()->has('user_id')) {
            return redirect()->route('login_form')->withErrors(['msg' => '請先登入']);
        }

        return $next($request);
    }
}

