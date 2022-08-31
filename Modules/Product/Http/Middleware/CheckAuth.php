<?php

namespace Modules\Product\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
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
        $user = auth()->user();

        if ($user != null) {
            return $next($request);
        }
        return response()->json('You are not authorized to access this page. Please signup first to access the page.');
    }
}
