<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
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
        $user = session('admin');
            if(!$user){
                echo "<script>alert('请登录');location.href='/login';</script>";
            }
        return $next($request);
    }
}
