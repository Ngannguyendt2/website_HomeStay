<?php

namespace App\Http\Middleware;

use Closure;

class CheckApprove
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
        $response = $next($request);

        if($request->approved_at == null) {
            return redirect()->route('waiting');
        }
        return $response;
    }
}
