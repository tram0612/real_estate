<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Users
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
        $user_id = $request->segment(5);
        //dd($req);
        
        $userRole=$user->role;
        if($role != ''){
            $arRole=explode('|',$role);
        }
       
        if($user->id==$user_id && $userRole=='mod')
        {
            return $next($request);
        }
        if(in_array($userRole, $arRole) )
        {
            return $next($request);
        }
       
        return redirect()->route('auth.login')->with('msg','Bạn chưa có quyền truy cập.');
    }
}
