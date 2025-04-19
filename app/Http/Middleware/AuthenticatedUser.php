<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/');
        }

        $authorized_pages = explode(', ', session('authorized_page'));

        $route_permissions = [
            'dashboard'           => '1',
            'upload_attendance'   => '2',
            'attendance_tracker'  => '2',
            'teacher_management'  => '3',
            'pupil_management'    => '4',
            'users'               => '5',
            'reports'             => '6',
        ];

        foreach ($route_permissions as $route => $id) {
            if ($request->routeIs($route) && !in_array($id, $authorized_pages)) {
                abort(404);
            }
        }

        return $next($request);
    }
}
