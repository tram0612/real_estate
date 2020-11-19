<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class ClandAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $user = Auth::user();
        $userRole=$user->role;
        if($role != ''){
            $arRole=explode('|',$role);
        }
        if(!in_array($userRole, $arRole)){
            return redirect()->route('auth.login')->with('msg','Bạn chưa có quyền truy cập.');
        }
        return $next($request);
    }
}
