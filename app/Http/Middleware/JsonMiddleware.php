<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class JsonMiddleware
{
    /**
     * Accept JSON only
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle( $request, Closure $next)
    {
        if (!$request->isMethod("OPTIONS")){
            $header = $request->header('Accept');
            if ($header != 'application/json') {
                return response(['message' => 'Only JSON requests are allowed'], 406);
            }

            $method = $request->method();
            $methods = ['PUT', 'PATCH', 'POST'];
            if (! in_array($method, $methods)) return $next($request);

            $header = $request->header('Content-Type');
            if (!Str::contains($header, 'application/json')) {
                return response(['message' => 'Only JSON requests are allowed'], 406);
            }
        }
        return $next($request);
    }
}
