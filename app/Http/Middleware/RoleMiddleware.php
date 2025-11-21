<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Pass multiple roles separated by `|`, e.g., 'Admin|Member'
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $user = $request->user();

        if (!$user) {
            return redirect('/login');
        }

        $roleArray = explode('|', $roles);

        if (!in_array($user->role->name, $roleArray)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
