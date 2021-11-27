<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureOwnPost
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
        // mengambil model post
        $post = $request->route()->parameter('post');

        // mengecek apakah post ini dimiliki user atau user merupakan admin/super-admin
        abort_unless(auth()->user()->id === $post->user_id || auth()->user()->hasAnyRole(['admin', 'super-admin']), 403,'anda tidak memiliki akses untuk postingan ini');

        return $next($request);
    }
}
