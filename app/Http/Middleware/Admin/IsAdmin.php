<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                app()->setLocale('ru');
                return $next($request);
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->route('admin_login');
        }


    }
}
