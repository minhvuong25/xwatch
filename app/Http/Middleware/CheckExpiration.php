<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Route;

class CheckExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $expirationDate = env('EXPIRATION_DATE');
        if (!empty($expirationDate)) {
            $expirationDate = strtotime($expirationDate);
            $now = time();
            if ($now > $expirationDate) {
                if (!Route::is('expired')) { 
                    return redirect()->route('expired');
                }
            }
        }
        return $next($request);
    }
}
