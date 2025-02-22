<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserAccessDashboardMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::user()->isAdmin()){
            return $next($request);
        }
        return redirect('/');

    }
}
