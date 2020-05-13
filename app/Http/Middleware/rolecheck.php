<?php

namespace App\Http\Middleware;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Closure;

class rolecheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('email',Auth::user()->email)->first();

        if($user->role == 0){
            Auth::logout();
        }
        return $next($request);
    }
}
