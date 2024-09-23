<?php

namespace App\Http\Middleware;

use Closure;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next, $guard = null)
    {
        $uuid = $request->headers->get('X-Request-ID');

        if (is_null($uuid)) {
            $uuid = Uuid::uuid4()->toString();

            $request->headers->set('X-Request-ID', $uuid);
        }

        $_SERVER['HTTP_X_REQUEST_ID'] = $uuid;

        $response = $next($request);

        $response->headers->set('X-Request-ID', $uuid);

        return $response;
    }
}
