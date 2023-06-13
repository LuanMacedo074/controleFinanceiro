<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class registerRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        DB::insert('insert into requests (request_ip,method,endpoint) values (?,?,?)', [$_SERVER['REMOTE_ADDR'],$_SERVER['REQUEST_METHOD'],$request->path()]);
        return $next($request);
    }
}
