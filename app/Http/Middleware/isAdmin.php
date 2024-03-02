<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->user());
        if ( $request->user()->role !== 'admin') {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to access Feature',
                    'data' => null,
                    'errors' => 'You\'re not Admin!',
                ], Response::HTTP_UNAUTHORIZED);
            }
            return back()->with('errors', 'Admin Only!');
        }
        return $next($request);
    }
}
