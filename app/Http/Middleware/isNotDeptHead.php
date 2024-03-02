<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isNotDeptHead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( $request->user()->role !== 'depthead') {
            return $next($request);
        }
        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to access Feature',
                'data' => null,
                'errors' => 'You\'re DeptHead!',
            ], Response::HTTP_UNAUTHORIZED);
        }
        return back()->with('errors', 'You\'re DeptHead!');
        
    }
}
