<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user=auth()->user();
        if($user && optional ($user->currentStatus())->name !=='active'){
        \Log::info('Entered EnsureUserIsActive middleware');
            
            abort(403,'You are not active');
        }
        return $next($request);
    }
}
