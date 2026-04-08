<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleUser): Response
    {
        if ($request->user()->role == $roleUser){
            return $next($request);
        } else {
            if ($request->user()->role == 'admin'){
                return redirect('/admin/home')->with('status', 'Tidak Punya Permission!');
            } elseif ($request->user()->role == 'staff') {
                return redirect('/staff/home')->with('status', 'Tidak Punya Permission!');
            }
        }
        return redirect('/')->with('status', 'Role tidak dikenali!');
    }
}
