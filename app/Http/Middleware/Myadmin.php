<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Spatie\Backup\BackupDestination\Backup;


class Myadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

   

    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->role == 'admin' ) {
            return $next($request);
        }
        return response('Unauthorized.', 401);
    }
}
