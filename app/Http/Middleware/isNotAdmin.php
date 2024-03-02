<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( $request->user()->role !== 'admin') {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to access feature',
                    'data' => null,
                    'errors' => 'You\'re not Admin!',
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return back()->with('errors', 'You\'re not Admin!');
        } return $next($request);
        
    }
}
