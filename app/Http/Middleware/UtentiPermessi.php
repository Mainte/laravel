<?php

namespace App\Http\Middleware;

use Closure;

class UtentiPermessi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permesso)
    {
        if (!$request->user()->hasPermesso($permesso)){
            return redirect()->route('Forbidden');
        }
        
        return $next($request);
    }
}
