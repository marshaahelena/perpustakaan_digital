<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna telah terautentikasi
        if (Auth::check()) {
            // Periksa apakah pengguna memiliki peran admin
            if (Auth::user()->role === 'admin') {
                return $next($request);
            }
        }

        // Jika pengguna tidak terautentikasi atau tidak memiliki peran admin, redirect ke 'home'
        return redirect('login');
    }
}
