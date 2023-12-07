<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TidakBolehAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // tentukan peranan pengguna
        if (auth()->user()->peranan_id == $role) {
            return response()->json('Tidak boleh akses');
        } else
            return $next($request);
    }
}
