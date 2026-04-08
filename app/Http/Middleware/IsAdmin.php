<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Controleer of gebruiker is ingelogd en admin rol heeft
        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403, 'Geen toegang');
        }

        return $next($request);
    }
}