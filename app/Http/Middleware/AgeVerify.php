<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the age from the query parameter in the URL
        $age = $request->query('age');

        // If age is less than 18, redirect to access denied page
        if ($age && $age < 18) {
            return redirect()->route('access.denied');
        }

        // If age is valid (18 or older), redirect to the dashboard
        if ($age && $age >= 18) {
            return redirect()->route('lib.user', ['userId' => 'Tel']);
        }

        // If age is not provided or doesn't match any condition, proceed with the request
        return $next($request);
    }

}