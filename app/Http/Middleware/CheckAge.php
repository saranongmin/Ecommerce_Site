<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {    $age = 20;
        if ($request->age <= 10) {
            return redirect('dasboard');
        dd('hello');
        }
        return $next($request);
    }
}
