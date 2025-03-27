<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class CheckIframe
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
        if ($request->is('iframe/*')) {
            URL::forceRootUrl(config('app.url'));
        }

        return $next($request);
    }
}
