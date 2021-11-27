<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Closure;
use Illuminate\Http\Request;

class EnsureOwnProfile
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
        // get user model
        // dd($request->route());
        $user = $request->route()->parameter('profile');


        if ($user->username !== auth()->user()->username) {
            return abort(403, 'Anda mau kemana heyyy');
        }
        return $next($request);
    }
}
