<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class News
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
        $author = $request->segment(5);
        //dd($user_id);
        
        $userRole=$user->role;
        if($role != ''){
            $arRole=explode('|',$role);
        }
       
        if($user->username==$author && $userRole=='mod')
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
