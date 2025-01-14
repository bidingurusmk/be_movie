<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        if (!Auth::guard('api')->check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return Response()->json([
                "status"=>false,
                "message"=>"token not found / invalid token"
            ],401);

        $user = Auth::guard('api')->user();

        foreach($roles as $role) {
        // Check if user has the role This check will depend on how your roles are set up
            if($user->role==$role)
                return $next($request);
    }

    return Response()->json([
        "status"=>false,
        "message"=>"unauthorized"
    ],401);
    }
}
