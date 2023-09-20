<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the role of the authenticated user
            $userRole = Auth::user()->role;

            // Check the user's role and redirect accordingly
            switch ($userRole) {
                case 'admin':
                    return redirect('/admindashboard');
                case 'dep':
//                    return redirect('/dashboard');
                // Add more cases for other roles if needed
            }
        }

        // For unauthenticated users, continue to the next middleware/route
        return $next($request);
    }
}
