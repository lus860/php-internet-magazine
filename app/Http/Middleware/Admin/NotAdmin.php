<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class NotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isUser()) {
                return redirect()->route('index');
            } elseif ($user->isAdmin()) {
                return redirect()->route('admin_dashboard');
            }
        } else {
            return $next($request);
        }

    }
}
