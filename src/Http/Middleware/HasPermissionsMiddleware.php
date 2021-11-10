<?php

namespace AlvariumDigital\PermissionsMakr\Http\Middleware;

use AlvariumDigital\PermissionsMakr\Helpers\HasPermissions;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasPermissionsMiddleware
{
    use HasPermissions;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $type
     * @param $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $type, ...$roles)
    {
        $user = Auth::user();
        if (!$user) {
            return $this->response();
        } else {
            if ($this->hasRole($user, $roles, $type)) {
                return $next($request);
            }
            return $this->response();
        }
    }

    /**
     * Check if an unauthorized route is configured to redirect to it
     * or abort with 403 response
     *
     * @return mixed
     */
    private function response()
    {
        if (config('permissions_makr.unauthorized_route')) {
            return redirect()->route(config('permissions_makr.unauthorized_route'));
        }
        return abort(403);
    }
}
