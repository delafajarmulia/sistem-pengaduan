<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaveLastRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jangan simpen route jika request berupa AJAX
        if(!$request->ajax() && $request->method() === 'GET'){
            // simpan route sebelumnya ke session
            session(['previous_route'=>url()->current()]);
        }
        return $next($request);
    }
}
