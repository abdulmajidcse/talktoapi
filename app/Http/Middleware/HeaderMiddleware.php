<?php

namespace App\Http\Middleware;

use Closure;

class HeaderMiddleware
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
        $request->headers->add(['access-control-allow-origin' => '*']);
        return $next($request);
    }
}
