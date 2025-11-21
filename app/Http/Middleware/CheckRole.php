<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !in_array($user->role->name, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
