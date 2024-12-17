<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the age from the query parameter in the URL
        $age = $request->query('age'); // This will get the 'age' query parameter

        // If age is less than 18, redirect to access denied page
        if ($age && $age < 18) {
            return redirect()->route('access.denied');
        }

        // If age is valid (18 or older), redirect to the dashboard
        if ($age && $age >= 18) {
            return redirect()->route('dashboard.user', ['userId' => 'Tel']); // Use the correct parameter name 'userId'
        }
        return $next($request);
        } 
    }
    

