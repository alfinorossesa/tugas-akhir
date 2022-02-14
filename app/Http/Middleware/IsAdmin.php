<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
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
        $user=Auth::user();
        // dd($user);
        if ($user->is_admin=='1') {
            
            return $next($request);
        }else{
            return redirect('home');
        }
    }
}
