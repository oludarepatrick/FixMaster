<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;

class ClientRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $designation = Auth::user()->designation;

        if($designation != '[CLIENT_ROLE]'){
            return \back();
        }

        return $next($request);
    }
}
