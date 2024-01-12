<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleAndPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$rolesOrPermissions)
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        foreach ($rolesOrPermissions as $roleOrPermission) {
            if ($this->checkRoleOrPermission($user, $roleOrPermission)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }

    private function checkRoleOrPermission($user, $roleOrPermission)
    {
        // Check if the user has the specified role
        if ($user->role === $roleOrPermission) {
            return true;
        }
        return false;
    }
}
